<?php
// �ѥ���ɺ�ȯ��


function doAction_passwd($requests)
{
	man_init_admin_do();
	$module_name = $GLOBALS['__Framework']['current_module'];
	
	$c_member_id = $requests['target_c_member_id'];
	$password = $requests['password'];
	
    if (!ctype_alnum($password) ||
        strlen($password) < 6 ||
        strlen($password) > 12) {
		admin_client_redirect('passwd',
			"�ѥ���ɤ�6��12ʸ����Ⱦ�ѱѿ������Ϥ��Ƥ�������", 
			"target_c_member_id=".$c_member_id);
		exit;
    }
	
	if ($requests['password'] !== $requests['password2']) {
		admin_client_redirect('passwd',
			"�ѥ���ɤ����פ��Ƥ��ޤ���",
			"target_c_member_id=".$c_member_id);
		exit;
	}
	
	//�ѥ�����ѹ�
	do_common_update_password($c_member_id, $password);
	
	//�᡼������
	$c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
	if ($c_member_secure['pc_address']) {
		do_password_query_mail_send($c_member_id, $c_member_secure['pc_address'], $password);
	} else {
		db_mail_send_m_ktai_password_query($c_member_id, $password);
	}
	
	admin_client_redirect('top', "�桼�����Υѥ���ɤ��ѹ������᡼����������ޤ���");	
}

?>
