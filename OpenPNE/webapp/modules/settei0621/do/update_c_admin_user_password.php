<?php
// �ѥ���ɺ�ȯ��


function doAction_update_c_admin_user_password($requests)
{
	man_init_admin_do();
	
	if (!db_admin_authenticate_password(
			$GLOBALS['AUTH']->uid(),
			$requests['old_password'])) {
		admin_client_redirect('edit_admin_password',
			"�ѥ���ɤ��㤤�ޤ�");
		exit;
	}
	
	$password = $requests['new_password'];
    if (!ctype_alnum($password) ||
        strlen($password) < 6 ||
        strlen($password) > 12) {
		admin_client_redirect('edit_admin_password',
			"�ѥ���ɤ�6��12ʸ����Ⱦ�ѱѿ������Ϥ��Ƥ�������");
		exit;
    }
	
	if ($requests['new_password'] !== $requests['new_password2']) {
		admin_client_redirect('edit_admin_password',
			"�ѥ���ɤ����פ��Ƥ��ޤ���");
		exit;
	}
	
	//�ѥ�����ѹ�
	db_admin_update_c_admin_user_password($GLOBALS['AUTH']->uid(), $password);
	
	$GLOBALS['AUTH']->t_logout();
	
	$hash_tbl =& AdminHashTable::singleton();
	$p = $hash_tbl->hash('login', 'normal');
	$m = $GLOBALS['__Framework']['current_module'];
	$msg = "�ѥ���ɤ��ѹ����ޤ������������ѥ���ɤǥ����󤷤ʤ����Ƥ���������";
	client_redirect("module_normal.php?m=$m&p=$p&msg=" . urlencode($msg));	
}

?>