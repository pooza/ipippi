<?php
//---------------------------------------------------------------------------
/**
 * ��񤹤�
 */
function doAction_h_taikai($request) {
	$password = $request['password'];
	$u = $GLOBALS['AUTH']->uid();
	
	if (!db_common_authenticate_password($u, $password)) {
		$msg = "�ѥ���ɤ��ְ�äƤ��ޤ�";
		client_redirect("page.php?p=h_taikai_confirm&msg=".urlencode($msg));
		exit;
	}
	
	//���λ�᡼������
	do_common_send_mail_taikai_end_pc($u);
	
	//������
	db_common_delete_c_member($u);
	
	//��������
	$GLOBALS['AUTH']->t_logout();
	$msg = "���λ���ޤ����������Ѥ��꤬�Ȥ��������ޤ�����";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));	
}
?>
