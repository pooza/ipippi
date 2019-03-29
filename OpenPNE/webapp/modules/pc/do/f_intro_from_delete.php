<?php
/**
フレンド紹介文削除

[引数]
target_c_member_id
body

[リダイレクト先]
f_home

[リダイレクト引数]

[権限]
フレンド関係にあるメンバー

*/
function doAction_f_intro_from_delete($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//-- 権限チェック
	//フレンド

	$status = db_common_friend_status($u, $target_c_member_id);
	if (!$status['is_friend']) {
		handle_kengen_error();
	}
	//---

	do_f_intro_edit_update_c_friend($target_c_member_id, $u, "");

	client_redirect("page.php?p=h_home");
}

