<?php
//---------------------------------------------------------------------------
/**
�����ѹ�

[����]
[������쥯����]
[������쥯�Ȱ���]
[����]
*/
function doAction_h_config_2($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$old_password = $request['old_password'];
	$new_password = $request['new_password'];
	$new_password2 = $request['new_password2'];
	// ----------
	
	$msg_list = array();
    if (!$new_password) $msg_list[] = "�ѥ���ɤ����Ϥ��Ƥ�������";
    if (!$new_password2) $msg_list[] = "�ѥ����(��ǧ)�����Ϥ��Ƥ�������";
    
    if ($new_password != $new_password2) $msg_list[] = "�ѥ���ɤ����פ��ޤ���";
    if (!ctype_alnum($new_password) ||
        strlen($new_password) < 6 ||
        strlen($new_password) > 12) {
        $msg_list[] = "�ѥ���ɤ�6��12ʸ����Ⱦ�ѱѿ������Ϥ��Ƥ�������";
    }
    
	if (!$msg_list && !db_common_authenticate_password($u, $old_password)) {
		$msg_list[] = "���ߤΥѥ���ɤ��㤤�ޤ�";
	}
    
    // error
    if ($msg_list) {
        $_REQUEST['msg'] = array_shift($msg_list);
        module_execute('pc', 'page', "h_config");
        exit;
    }
    
	do_common_update_password($u, $new_password);

	$GLOBALS['AUTH']->t_logout();
	$msg = "�ѥ���ɤ��ѹ����ޤ������������ѥ���ɤǺƥ����󤷤Ƥ���������";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
}
?>
