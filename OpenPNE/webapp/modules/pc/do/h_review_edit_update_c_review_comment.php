<?php
function doAction_h_review_edit_update_c_review_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$c_review_comment_id = $request['c_review_comment_id'];
	$body = $request['body'];
	$satisfaction_level = $request['satisfaction_level'];
	// ----------

	//--- ���¥����å�
	//��ӥ塼�����Ⱥ�����

	if(!do_h_review_edit_c_review_comment4c_review_comment_id_c_member_id($c_review_comment_id, $u)){
		handle_kengen_error();
	}
	//---

	if(is_null($body) || $body === '') $err_msg[] = "��ӥ塼�����Ϥ��Ʋ�����";
	if(!$satisfaction_level) $err_msg[] = "��­�٤����Ϥ��Ʋ�����";

	if($err_msg) {
		$c_review = do_h_review_edit_c_review4c_review_comment_id($c_review_comment_id);
		$_REQUEST['asin'] = $c_review['asin'];
		$_REQUEST['err_msg'] = $err_msg;
		
		module_execute('pc', 'page', "h_review_edit");
		exit;
	}


	do_h_review_edit_update_c_review_comment($c_review_comment_id, $body, $satisfaction_level);

	client_redirect("page.php?p=fh_review_list_member");
}
?>
