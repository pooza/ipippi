<?php
//---------------------------------------------------------------------------
/**
フレンドリンクを削除

[引数]
target_c_member_id

[リダイレクト]
fh_friend_list

[リダイレクト引数]
target_c_member_id

[権限]
フレンド関係にあるメンバー

*/
function doAction_fh_friend_list_delete_c_friend($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//--- 権限チェック
	//フレンド
	//フレンドでなくても特に影響はないのでチェックしない
	//---
    
	$ret = do_fh_friend_list_delete_c_friend($u, $target_c_member_id);

	client_redirect("page.php?p=h_manage_friend");
}

