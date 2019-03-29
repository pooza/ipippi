<?php
function doAction_bookmark_delete($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//--- 権限チェック
	//ブックマーク登録されている
	//登録されていなくても特に影響はないのでチェックしない
	//---

	do_h_bookmark_delete($u, $target_c_member_id);

	client_redirect("page.php?p=h_bookmark_list");
}

