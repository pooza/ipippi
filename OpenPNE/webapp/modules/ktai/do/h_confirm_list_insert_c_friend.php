<?php
//-----------------------------------------------------------------------
/**
リンク承認

[引数]
target_c_friend_confirm_id

[リダイレクト先]
f_message_send

[リダイレクト引数]

[権限]
リンク要請を受けているメンバー

*/
function doAction_h_confirm_list_insert_c_friend($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_friend_confirm_id = $requests['target_c_friend_confirm_id'];
	// ----------

	$cfc = _do_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id);

	//--- 権限チェック
	//リンク承認を受けている人

	if ($cfc['c_member_id_to'] != $u) {
		handle_kengen_error();
	}
	//---

	do_h_confirm_list_insert_c_friend($target_c_friend_confirm_id, $u);

	do_h_confirm_list_insert_c_friend_mail_send($cfc['c_member_id_from'], $u);

	//msg=3 "承認が完了しました。"
	client_redirect("ktai_page.php?p=h_confirm_list&msg=3&$tail");
}

