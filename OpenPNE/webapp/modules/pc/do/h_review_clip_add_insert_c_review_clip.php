<?php
function doAction_h_review_clip_add_insert_c_review_clip($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_review_id = $request['c_review_id'];
	// ----------

	//--- 権限チェック
	//レビューコメント作者以外

	if(do_h_review_clip_add_c_review_id4c_review_id_c_member_id($c_review_id, $u)){
		client_redirect("page.php?p=h_review_clip_list");
		exit;
	}
	//---

	do_h_review_clip_add_insert_c_review_clip($c_review_id, $u);

	client_redirect("page.php?p=h_review_clip_list");
}

