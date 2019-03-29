<?php
function doAction_h_review_clip_list_delete_c_review_clip($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_review_clips = $request['c_review_clips'];
	// ----------

	//--- 権限チェック
	//クリップ作成者
	//do_h_review_clip_list_delete_c_review_clip の中で対応済み
	//---


	do_h_review_clip_list_delete_c_review_clip($u, $c_review_clips);	

	client_redirect("page.php?p=h_review_clip_list");
}
?>
