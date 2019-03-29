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
		die('�⥸�塼�뤬���Ĥ���ޤ���');
	}
	if (!_check_type($type)) {
		die('�ꥯ�����Ȥμ��ब����������ޤ���');
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
			// module �� auth.inc ��Ƥ�
			require_once($auth);
		} else {
			// core �� auth.inc ��Ƥ�
			require_once(DOCUMENT_ROOT . "/lib/auth.inc");
		}
		break;
	}

	if (!$action = _check_action($action)) {
		die('�ڡ��������Ĥ���ޤ���');
	}
	$GLOBALS['__Framework']['current_action'] = $action;	

	$ext = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/ext/{$type}/{$action}.php";
	$dft = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/{$type}/{$action}.php";
	if (is_readable($ext)) {  // ��ĥ�¹ԥե���������å�
		require_once($ext);
	} elseif (is_readable($dft)) {  // ɸ��¹ԥե���������å�
		require_once($dft);
	} else {
		die('�ڡ��������Ĥ���ޤ���');
	}
	
	// send no-cache header
	switch ($type) {
	case "normal":
	case "page":
		send_headers();
		break;
	}

	// ---------- �ꥯ�����ȥХ�ǡ������ ----------
	
	// ��ĥ�Х�ǡ��������å�
	$local_ini = $GLOBALS['__Framework']['modules_dir'] . "/{$module}/ext/validate/{$type}/{$action}.ini";
	if (!is_readable($local_ini)) {
		// ɸ��Х�ǡ���
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
		// call_user_func �ǻ����Ϥ��Ǥ��ʤ��Х���
//		call_user_func($init_func, $smarty);
		if (isset($smarty)) {
			$init_func($smarty);
		} else {
			$init_func();
		}
	}

	
	// �¹Դؿ���ƤӽФ���ǽ�������å�
	
	// �ƤӽФ��ؿ�̾
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
		die('�ڡ��������Ĥ���ޤ���');
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
 * �⥸�塼��̾�����
 * ���ξ��ϥǥե���ȥ⥸�塼����֤�
 * 
 * �ְ�ä��⥸�塼��̾����ꤷ��
 * �ǥե���ȥ⥸�塼�뤬¸�ߤ��ʤ����� false
 * 
 * @param string $module module name
 */
function _check_module($module)
{
	// �ѿ����ȥ�������С��Τ�
	// ��../�����ϵ����ʤ�
	if (preg_match('/\W/', $module)) {
		// �⥸�塼��̾�������Ǥ�
		return false;
	}

	if (empty($module)) {
		if (empty($GLOBALS['__Framework']['default_module'])) {
			// �⥸�塼�뤬���ꤵ��Ƥ��ޤ���
			return false;
		} else {
			$module = $GLOBALS['__Framework']['default_module'];
		}
	}

	if (!file_exists($GLOBALS['__Framework']['modules_dir'] . '/' . $module)) {
		// �⥸�塼��λ��꤬�ְ�äƤ��ޤ�
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
	// �ѿ����ȥ�������С��Τ�
	// ��../�����ϵ����ʤ�
	if (preg_match('/\W/', $action)) {
		// ���������̾�������Ǥ�
		return false;
	}

	if (empty($action)) {
		$type = $GLOBALS['__Framework']['current_type'];
		if (empty($GLOBALS['__Framework']['default_' . $type])) {
			// �ڡ��������ꤵ��Ƥ��ޤ���
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
		// ���դ����
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		
		// ��˽�������Ƥ���
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
