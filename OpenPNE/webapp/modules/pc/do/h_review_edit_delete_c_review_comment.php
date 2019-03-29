<?php
function doAction_h_review_edit_delete_c_review_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_review_comment_id = $request['c_review_comment_id'];
	// ----------

	//--- 権限チェック
	//レビューコメント作者

	if(!do_h_review_edit_c_review_comment4c_review_comment_id_c_member_id($c_review_comment_id, $u)){
		handle_kengen_error();
	}
	//---

	$c_review_id = do_common_c_review_id4c_review_comment_id($c_review_comment_id);

	do_h_review_edit_delete_c_review_comment($c_review_comment_id);

	//コメント件数が0件になった場合は
	// c_review / c_review_clip / c_commu_review を削除する
	if (do_common_count_c_review_comment4c_review_id($c_review_id) === 0) {
		do_delete_c_review4c_review_id($c_review_id);
	}

	client_redirect("page.php?p=fh_review_list_member&c_member_id=".$u);

}

