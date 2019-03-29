<?php
//---------------------------------------------------------------------------
/**
メッセージを送る

[引数]
title
body
target_c_member_id

[リダイレクト]
h_message_box

[リダイレクト引数]

[権限]
全ユーザー

*/
function doAction_h_message_insert_message($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$title = $request['title'];
	$body = $request['body'];
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//--- 権限チェック
	//自分以外

	if ($target_c_member_id == $u) {
		handle_kengen_error();
	}
	
    //アクセスブロック設定
	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block");
		exit;
	}
	//---

	do_common_send_message($u, $target_c_member_id, $title,$body);

	client_redirect("page.php?p=h_message_box");
}
?>
