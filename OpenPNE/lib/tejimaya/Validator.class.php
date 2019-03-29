<?php

/**
 * リクエスト変数のバリデータ
 */
class Validator
{
	/**
	 * @var array 検証ルール
	 * @access private
	 */
	var $rules;
	
	/**
	 * @var array 検証済みリクエストパラメタ
	 * @access private
	 */
	var $params;

	/**
	 * @var array エラー
	 * @access private
	 */
	var $errors;

	/**
	 * @var array 検証対象リクエストパラメタ
	 * @access private
	 */
	var $requests;
	
	/**
	 * @var string デフォルトフィルター
	 */
	var $default_filter = 'ntrim,rtrim';
	
	/**
	 * バリデータの初期化
	 * 
	 * @param array $rules
	 * @param array $requests
	 */
	function Validator($rules = array(), $requests = array())
	{
		$this->rules = $rules;
		$this->params = array();
		$this->errors = array();
		if ($requests) {
			$this->requests = $requests;
		} else {
			$this->requests = $_REQUEST;
		}
	}
	
	/**
	 * ルールの追加
	 * 
	 * @access public
	 */
	function addRules($rules)
	{
		$this->rules = array_merge($this->rules, $rules);
	}
	
	/**
	 * ルールをiniファイルから追加
	 * 
	 * @access public
	 */
	function addIniSetting($ini_path)
	{
		if (!is_readable($ini_path) ||
			!$rules = parse_ini_file($ini_path, true)) {
		
			return false;
		}
		
		$this->addRules($rules);
		return true;
	}

	/**
	 * (検証済み)リクエストパラメータを取得
	 * 
	 * @access public
	 * @return array
	 */
	function getParams()
	{
		return $this->params;
	}
	
	/**
	 * エラー情報を取得
	 * 
	 * @access public
	 * @return array
	 */
	function getErrors()
	{
		return $this->errors;
	}
	
	/**
	 * (検証前の)リクエストパラメータを追加
	 * 
	 * @access public
	 */
	function addRequests($requests)
	{
/*
		// 2006/1/22 tkoishi@b-shock.co.jp
		// Warningが出るので、配列にキャストする様に。
		$this->requests = array_merge($this->requests, $requests);
*/
		$this->requests = array_merge((array)$this->requests, (array)$requests);
	}
	
	/**
	 * パラメータに検証済みの値をセット
	 * 
	 * @access private
	 * @param string $key
	 * @param string $value
	 */
	function _setParam($key, $value)
	{
		$this->params[$key] = $value;
	}
		
	/**
	 * エラー情報を設定
	 * 
	 * @access private
	 * @param string $key
	 * @param string $msg エラーメッセージ
	 */
	function _setError($key, $msg)
	{
		$this->errors[$key] = $msg;
	}
		
	/**
	 * validate
	 * 
	 * @access public
	 * @return boolean エラーが発生しなかったかどうか
	 */
	function validate()
	{
		foreach ($this->rules as $key => $rule) {
			$rule = $this->_initRule($key, $rule);

			$values = array();
			if (isset($this->requests[$key])) {
				if (!is_array($this->requests[$key])) {
					$values = array($this->requests[$key]);
				} else {
					$values = $this->requests[$key];
				}
			}

			if (empty($rule['is_array'])) {
				$reqval = array_shift($values);
				$result = $this->_filter($reqval, $rule['pre_filter']);
				
				// 必須項目チェック
				if (is_null($result) || $result === "") {
					if (!empty($rule['required'])) {
						if (isset($rule['required_error'])) {
							$error = $rule['required_error'];
						} else {
							$error = "{$rule['caption']}を入力してください。";
						}
						$this->_setError($key, $error);
					} else {
						if (isset($rule['default'])) {
							$result = $rule['default'];
						} else {
							$result = null;
						}
					}
				} else {
					$this->_validate($key, $result, $rule);
				}
			} else {
				$result = array();
				$empty = true;
				foreach ($values as $value) {
					$value = $this->_filter($value, $rule['pre_filter']);
					if (is_null($value) || $value === "") {
						continue;
					}
					
					$this->_validate($key, $value, $rule);
					$result[] = $value;
					$empty = false;
				}
				if ($empty) {
					if (!empty($rule['required'])) {
						if (isset($rule['required_error'])) {
							$error = $rule['required_error'];
						} else {
							$error = "{$rule['caption']}を入力してください。";
						}
						$this->_setError($key, $error);
					} else {
						if (isset($rule['default'])) {
							$result = array($rule['default']);
						} else {
							$result = array();
						}
					}
				}
			}
			
			$this->_setParam($key, $result);
		}
		
		return empty($this->errors);
	}
	
	/**
	 * 検証ルールの初期化
	 */
	function _initRule($key, $rule)
	{
		if (!isset($rule['caption'])) {
			$rule['caption'] = $key;
		}
		
		if (!isset($rule['pre_filter'])) {
			$rule['pre_filter'] = $this->default_filter;
		}
		
		if (empty($rule['type'])) {
			$rule['type'] = 'string';
		}
		
		return $rule;
	}
	
	/**
	 * _filter
	 * 
	 * @access private
	 * @param string $value
	 * @param string $filter
	 * @return string フィルターを通した値
	 */
	function _filter($value, $filter)
	{
		$filters = explode(',', $filter);
		foreach ($filters as $filter) {
			if (!empty($filter)) {
				switch ($filter) {
				case "trim":
					$value = trim($value);
					// 全角スペース
					$value = mb_ereg_replace('^[　]+', '', $value);
					$value = mb_ereg_replace('[　]+$', '', $value);
					break;
				case "ltrim":
					$value = ltrim($value);
					$value = mb_ereg_replace('^[　]+', '', $value); // 全角スペース
					break;
				case "rtrim":
					$value = rtrim($value);
					$value = mb_ereg_replace('[　]+$', '', $value); // 全角スペース
					break;
				case "ntrim":
					// NULL バイトを取る
					$value = str_replace("\0", "", $value);
					break;
				}
			}
		}
		return $value;
	}
	
	/**
	 * _validate
	 * 
	 * @access private
	 * @param string $key
	 * @param string $reqval
	 * @param array $rule
	 * @return boolean
	 */
	function _validate($key, $reqval, $rule)
	{	
		// 型チェック
		switch (strtolower($rule['type'])) {
		case "int":
			if (!is_numeric($reqval)) {
				if (isset($rule['type_error']))
					$error = $rule['type_error'];
				else
					$error = "{$rule['caption']}は数値で入力してください";
				
				$this->_setError($key, $error);
				return false;
			}
			break;
		case "bool":
			if ($reqval != "0" && $reqval != "1") {
				if (isset($rule['type_error']))
					$error = $rule['type_error'];
				else
					$error = "{$rule['caption']}の値が不正です";
				
				$this->_setError($key, $error);
				return false;
			}
			break;
		case "string":
			break;
		case "regexp":
			if (isset($rule['regexp']) && !preg_match($rule['regexp'], $reqval)) {
				if (isset($rule['type_error']))
					$error = $rule['type_error'];
				else
					$error = "{$rule['caption']}を正しく入力してください";
					$this->_setError($key, $error);
				return false;
			}
			break;
		default:
			$error = "{$rule['type']}は未定義の型です。";
			$this->_setError($key, $error);
			return false;
		}
	
		// min/max チェック
		switch ($rule['type']) {
		case "int":
			// min
			if (isset($rule['min']) && $reqval < intval($rule['min'])) {
				if (isset($rule['min_error']))
					$error = $rule['min_error'];
				else
					$error = "{$rule['caption']}は{$rule['min']}以上の数値で入力してください";
			
				$this->_setError($key, $error);
				return false;
			}
			// max
			if (isset ($rule['max']) && $reqval > $rule['max']) {
				if (isset($rule['max_error']))
					$error = $rule['max_error'];
				else
					$error = "{$rule['caption']}は{$rule['max']}以下の数値で入力してください";
				
				$this->_setError($key, $error);
				return false;
			}
			break;
		case "string":
		case "regexp":
			// min
			if (isset($rule['min']) && strlen($reqval) < $rule['min']) {
				if (isset($rule['min_error']))
					$error = $rule['min_error'];
				else
					$error = "{$rule['caption']}は{$rule['min']}文字以上で入力してください(全角の場合はこの半分)";
				
				$this->_setError($key, $error);
				return false;
			}
			// max
			if (isset ($rule['max']) && strlen($reqval) > $rule['max']) {
				if (isset($rule['max_error']))
					$error = $rule['max_error'];
				else
					$error = "{$rule['caption']}は{$rule['max']}文字以内で入力してください(全角の場合はこの半分)";
				
				$this->_setError($key, $error);
				return false;
			}
			break;
		}
		
		return true;
	}
}

?>