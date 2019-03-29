<?php

/**
 * module_execute
 *
 * @access public
 * @param string $module a requested module neme.
 * @param string $type request type. 'page', 'do', 'normal' or 'do_normal' 
 * @param string $action requested page/command name.
 * @param array  $errors error message strings.
 */
function module_execute($module, $type, $action = '', $errors = array())
{
	if (!$module = _check_module($module)) {
		die('モジュールが見つかりません');
	}
	if (!_check_type($type)) {
		die('リクエストの種類が正しくありません');
	}
	$GLOBALS['__Framework']['current_module'] = $module;
	$GLOBALS['__Framework']['current_type'] = $type;

	// init
	$init = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/init.inc";
	if (is_readable($init)) {
		require_once($init);
	}
	
	// auth
	switch ($type) {
	case "page":
	case "do":
		$auth = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/auth.inc";
		if (is_readable($auth)) {
			// module の auth.inc を呼ぶ
			require_once($auth);
		} else {
			// core の auth.inc を呼ぶ
			require_once(DOCUMENT_ROOT . "/lib/auth.inc");
		}
		break;
	}

	if (!$action = _check_action($action)) {
		die('ページが見つかりません');
	}
	$GLOBALS['__Framework']['current_action'] = $action;	

	$ext = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/ext/{$type}/{$action}.php";
	$dft = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/{$type}/{$action}.php";
	if (is_readable($ext)) {  // 拡張実行ファイルチェック
		require_once($ext);
	} elseif (is_readable($dft)) {  // 標準実行ファイルチェック
		require_once($dft);
	} else {
		die('ページが見つかりません');
	}
	
	// send no-cache header
	switch ($type) {
	case "normal":
	case "page":
		send_headers();
		break;
	}

	// ---------- リクエストバリデーション ----------
	
	// 拡張バリデータチェック
	$local_ini = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/ext/validate/{$type}/{$action}.ini";
	if (!is_readable($local_ini)) {
		// 標準バリデータ
		$local_ini = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/validate/{$type}/{$action}.ini";
	}
	$validator = new CommonValidate;
	list($result, $requests) = $validator->common_validate(array($local_ini));
	
	if ($result === false) {
		$errors = $validator->getErrors();
		//TODO:
		page_handleError($action, $errors);
	}
	
	// ----------------------------------------------


	switch ($type) {
	case "page":
	case "normal":
		$smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
		$smarty->ext_set_call_type($module);
	
		$smarty->assign("requests", $requests);
	
		$smarty->assign('msg', $requests['msg']);
		$smarty->assign('msg1', $requests['msg1']);
		$smarty->assign('msg2', $requests['msg2']);
		$smarty->assign('msg3', $requests['msg3']);
		if ($errors) {
			$smarty->assign('errors', $errors);
		}
		break;
	}

	// init function
	$init_func = "init_{$module}_{$type}";
	if (function_exists($init_func)) {
		// call_user_func で参照渡しできないバグが
//		call_user_func($init_func, $smarty);
		if (isset($smarty)) {
			$init_func($smarty);
		} else {
			$init_func();
		}
	}

	
	// 実行関数を呼び出し可能かチェック
	
	// 呼び出す関数名
	if ($type !== 'do_normal') {
		$call_func = "{$type}Action_{$action}";
	} else {
		$call_func = "doNormalAction_{$action}";
	}
	
	if (function_exists($call_func)) {
		switch ($type) {
		case "page":
		case "normal":
			$call_func($smarty, $requests);
			//call_user_func_array($call_func, array($smarty, $requests));
			break;
		case "do":
		case "do_normal":
			$call_func($requests);
			//call_user_func_array($call_func, array($requests));
			break;
		}
	} else {
		die('ページが見つかりません');
	}
	// ----------------------------------------------

	//logger
	if (defined('LOG_C_ACCESS_LOG') && LOG_C_ACCESS_LOG) {
		if ($module == 'pc' && $type == 'page') {
			p_access_log($GLOBALS['AUTH']->uid(), $action);
		}
		elseif ($module == 'ktai' && $type == 'page') {
			p_access_log($GLOBALS['KTAI_C_MEMBER_ID'], $action, 1);
		}
	}

	return true;
}

/**
 * モジュール名を取得
 * 空の場合はデフォルトモジュールを返す
 * 
 * 間違ったモジュール名を指定した
 * デフォルトモジュールが存在しない場合は false
 * 
 * @param string $module module name
 */
function _check_module($module)
{
	// 英数字とアンダーバーのみ
	// 「../」等は許さない
	if (preg_match('/\W/', $module)) {
		// モジュール名が不正です
		return false;
	}

	if (empty($module)) {
		if (empty($GLOBALS['__Framework']['default_module'])) {
			// モジュールが指定されていません
			return false;
		} else {
			$module = $GLOBALS['__Framework']['default_module'];
		}
	}

	if (!file_exists($GLOBALS['__Framework']['modules_dir'] . '/' . $module)) {
		// モジュールの指定が間違っています
		return false;
	}

	return $module;
}

function _check_type($type)
{
	switch ($type) {
		case "page":
		case "normal":
		case "do":
		case "do_normal":
			break;
		default:
			// unknown type
			return false;
	}
	
	return $type;
}

function _check_action($action)
{
	// 英数字とアンダーバーのみ
	// 「../」等は許さない
	if (preg_match('/\W/', $action)) {
		// アクション名が不正です
		return false;
	}

	if (empty($action)) {
		$type = $GLOBALS['__Framework']['current_type'];
		if (empty($GLOBALS['__Framework']['default_' . $type])) {
			// ページが指定されていません
			return false;
		} else {
			$action = $GLOBALS['__Framework']['default_' . $type];
		}
	}
	
	return $action;
}

function send_headers()
{
	if (!headers_sent()) {
		header("Content-Type: text/html; charset=EUC-JP");
		
		// no-cache
		// 日付が過去
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		
		// 常に修正されている
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		
		// HTTP/1.1
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		// HTTP/1.0
		header("Pragma: no-cache");
		
		return true;
	} else {
		return false;
	}
}

?>
