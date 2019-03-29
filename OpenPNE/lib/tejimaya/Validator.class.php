<?php

/**
 * �ꥯ�������ѿ��ΥХ�ǡ���
 */
class Validator
{
	/**
	 * @var array ���ڥ롼��
	 * @access private
	 */
	var $rules;
	
	/**
	 * @var array ���ںѤߥꥯ�����ȥѥ�᥿
	 * @access private
	 */
	var $params;

	/**
	 * @var array ���顼
	 * @access private
	 */
	var $errors;

	/**
	 * @var array �����оݥꥯ�����ȥѥ�᥿
	 * @access private
	 */
	var $requests;
	
	/**
	 * @var string �ǥե���ȥե��륿��
	 */
	var $default_filter = 'ntrim,rtrim';
	
	/**
	 * �Х�ǡ����ν����
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
	 * �롼����ɲ�
	 * 
	 * @access public
	 */
	function addRules($rules)
	{
		$this->rules = array_merge($this->rules, $rules);
	}
	
	/**
	 * �롼���ini�ե����뤫���ɲ�
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
	 * (���ںѤ�)�ꥯ�����ȥѥ�᡼�������
	 * 
	 * @access public
	 * @return array
	 */
	function getParams()
	{
		return $this->params;
	}
	
	/**
	 * ���顼��������
	 * 
	 * @access public
	 * @return array
	 */
	function getErrors()
	{
		return $this->errors;
	}
	
	/**
	 * (��������)�ꥯ�����ȥѥ�᡼�����ɲ�
	 * 
	 * @access public
	 */
	function addRequests($requests)
	{
/*
		// 2006/1/22 tkoishi@b-shock.co.jp
		// Warning���Ф�Τǡ�����˥��㥹�Ȥ����ͤˡ�
		$this->requests = array_merge($this->requests, $requests);
*/
		$this->requests = array_merge((array)$this->requests, (array)$requests);
	}
	
	/**
	 * �ѥ�᡼���˸��ںѤߤ��ͤ򥻥å�
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
	 * ���顼���������
	 * 
	 * @access private
	 * @param string $key
	 * @param string $msg ���顼��å�����
	 */
	function _setError($key, $msg)
	{
		$this->errors[$key] = $msg;
	}
		
	/**
	 * validate
	 * 
	 * @access public
	 * @return boolean ���顼��ȯ�����ʤ��ä����ɤ���
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
				
				// ɬ�ܹ��ܥ����å�
				if (is_null($result) || $result === "") {
					if (!empty($rule['required'])) {
						if (isset($rule['required_error'])) {
							$error = $rule['required_error'];
						} else {
							$error = "{$rule['caption']}�����Ϥ��Ƥ���������";
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
							$error = "{$rule['caption']}�����Ϥ��Ƥ���������";
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
	 * ���ڥ롼��ν����
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
	 * @return string �ե��륿�����̤�����
	 */
	function _filter($value, $filter)
	{
		$filters = explode(',', $filter);
		foreach ($filters as $filter) {
			if (!empty($filter)) {
				switch ($filter) {
				case "trim":
					$value = trim($value);
					// ���ѥ��ڡ���
					$value = mb_ereg_replace('^[��]+', '', $value);
					$value = mb_ereg_replace('[��]+$', '', $value);
					break;
				case "ltrim":
					$value = ltrim($value);
					$value = mb_ereg_replace('^[��]+', '', $value); // ���ѥ��ڡ���
					break;
				case "rtrim":
					$value = rtrim($value);
					$value = mb_ereg_replace('[��]+$', '', $value); // ���ѥ��ڡ���
					break;
				case "ntrim":
					// NULL �Х��Ȥ���
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
		// �������å�
		switch (strtolower($rule['type'])) {
		case "int":
			if (!is_numeric($reqval)) {
				if (isset($rule['type_error']))
					$error = $rule['type_error'];
				else
					$error = "{$rule['caption']}�Ͽ��ͤ����Ϥ��Ƥ�������";
				
				$this->_setError($key, $error);
				return false;
			}
			break;
		case "bool":
			if ($reqval != "0" && $reqval != "1") {
				if (isset($rule['type_error']))
					$error = $rule['type_error'];
				else
					$error = "{$rule['caption']}���ͤ������Ǥ�";
				
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
					$error = "{$rule['caption']}�����������Ϥ��Ƥ�������";
					$this->_setError($key, $error);
				return false;
			}
			break;
		default:
			$error = "{$rule['type']}��̤����η��Ǥ���";
			$this->_setError($key, $error);
			return false;
		}
	
		// min/max �����å�
		switch ($rule['type']) {
		case "int":
			// min
			if (isset($rule['min']) && $reqval < intval($rule['min'])) {
				if (isset($rule['min_error']))
					$error = $rule['min_error'];
				else
					$error = "{$rule['caption']}��{$rule['min']}�ʾ�ο��ͤ����Ϥ��Ƥ�������";
			
				$this->_setError($key, $error);
				return false;
			}
			// max
			if (isset ($rule['max']) && $reqval > $rule['max']) {
				if (isset($rule['max_error']))
					$error = $rule['max_error'];
				else
					$error = "{$rule['caption']}��{$rule['max']}�ʲ��ο��ͤ����Ϥ��Ƥ�������";
				
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
					$error = "{$rule['caption']}��{$rule['min']}ʸ���ʾ�����Ϥ��Ƥ�������(���Ѥξ��Ϥ���Ⱦʬ)";
				
				$this->_setError($key, $error);
				return false;
			}
			// max
			if (isset ($rule['max']) && strlen($reqval) > $rule['max']) {
				if (isset($rule['max_error']))
					$error = $rule['max_error'];
				else
					$error = "{$rule['caption']}��{$rule['max']}ʸ����������Ϥ��Ƥ�������(���Ѥξ��Ϥ���Ⱦʬ)";
				
				$this->_setError($key, $error);
				return false;
			}
			break;
		}
		
		return true;
	}
}

?>