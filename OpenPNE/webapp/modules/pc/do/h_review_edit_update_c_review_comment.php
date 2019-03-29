<?php
function doAction_h_review_edit_update_c_review_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_review_comment_id = $request['c_review_comment_id'];
	$body = $request['body'];
	$satisfaction_level = $request['satisfaction_level'];
	// ----------

	//--- 権限チェック
	//レビューコメント作成者

	if(!do_h_review_edit_c_review_comment4c_review_comment_id_c_member_id($c_review_comment_id, $u)){
		handle_kengen_error();
	}
	//---

	if(is_null($body) || $body === '') $err_msg[] = "レビューを入力して下さい";
	if(!$satisfaction_level) $err_msg[] = "満足度を入力して下さい";

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

