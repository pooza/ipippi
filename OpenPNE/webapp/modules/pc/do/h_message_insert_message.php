<?php
//---------------------------------------------------------------------------
/**
��å�����������

[����]
title
body
target_c_member_id

[������쥯��]
h_message_box

[������쥯�Ȱ���]

[����]
���桼����

*/
function doAction_h_message_insert_message($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$title = $request['title'];
	$body = $request['body'];
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//--- ���¥����å�
	//��ʬ�ʳ�

	if ($target_c_member_id == $u) {
		handle_kengen_error();
	}
	
    //���������֥�å�����
	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block");
		exit;
	}
	//---

	do_common_send_message($u, $target_c_member_id, $title,$body);

	client_redirect("page.php?p=h_message_box");
}
?>
