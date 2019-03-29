<?php
//----------------------------------------------------------------------
/**
コミュ参加承認

[引数]
target_c_commu_member_confirm_id

[リダイレクト先]
f_message_send

[リダイレクト引数]

[権限]
コミュニティ参加要請を受けているユーザー

*/
function doAction_h_confirm_list_insert_c_commu_member($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_member_confirm_id = $requests['target_c_commu_member_confirm_id'];
	// ----------
	$is_receive_mail = 0;

	//--- 権限チェック
	//コミュ参加承認を受けている人

	$cmc = _do_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id);

	if ($cmc['c_member_id_admin'] != $u) {
		handle_kengen_error();
	}
	//---

	do_h_confirm_list_insert_c_commu_member($target_c_commu_member_confirm_id, $u, $is_receive_mail);

	//msg=3 "承認が完了しました。"
	client_redirect("ktai_page.php?p=h_confirm_list&msg=3&$tail");
}

