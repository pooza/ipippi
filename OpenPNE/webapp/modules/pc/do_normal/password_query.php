<?php
function doNormalAction_password_query($requests)
{
	// --- �ꥯ�������ѿ�
	$pc_address = $requests['pc_address'];
	$c_password_query_id = $requests['c_password_query_id'];
	$c_password_query_answer = $requests['c_password_query_answer'];
	// ----------

	//--- ���¥����å�
	//�ѥ���ɳ�ǧ�μ�������������äƤ���
	
	if (!$c_member_id = do_password_query_is_password_query_complete($pc_address,
		            $c_password_query_id,$c_password_query_answer)) {
		$msg = urlencode("�ѥ���ɺƼ�������");
		client_redirect("normal.php?p=password_query&msg=$msg");
		exit;
	}
	//---

	// �ѥ���ɺ�ȯ��
	$new_password = do_common_create_password();
	do_common_update_password($c_member_id, $new_password);

	do_password_query_mail_send($c_member_id, $pc_address, $new_password);

	$msg = "�ѥ���ɤ�᡼����������ޤ�����";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
}
?>