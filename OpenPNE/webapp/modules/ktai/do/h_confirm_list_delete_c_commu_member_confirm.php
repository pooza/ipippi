<?php
//---------------------------------------------------------------------
/**
コミュ参加拒否

[引数]
target_c_commu_member_confirm_id

[リダイレクト先]
h_confirm_list

[リダイレクト引数]

[権限]
コミュニティ参加要請を受けているメンバー

*/
function doAction_h_confirm_list_delete_c_commu_member_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_member_confirm_id = $requests['target_c_commu_member_confirm_id'];
	// ----------

 	//--- 権限チェック
 	//コミュ参加承認を受けている or 送った人

	$cmc = _do_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id);

	if ($cmc['c_member_id'] != $u
		&& $cmc['c_member_id_admin'] != $u) {
		handle_kengen_error();
	}
	//---

	do_h_confirm_list_delete_c_commu_member_confirm($target_c_commu_member_confirm_id, $u);

	//msg=4 "承認依頼を削除しました。"
	client_redirect("ktai_page.php?p=h_confirm_list&msg=4&$tail");
}

