<?php
//-------------------------------------------------------------------------
/**
リンク拒否

[引数]
target_c_friend_confirm_id

[リダイレクト先]
h_confirm_list

[リダイレクト引数]

[権限]
リンク要請を受けているメンバー

*/
function doAction_h_confirm_list_delete_c_friend_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_friend_confirm_id = $requests['target_c_friend_confirm_id'];
	// ----------

	//--- 権限チェック
	//リンク承認を受けている or 送った人

    $cfc = _do_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id);

    if ($cfc['c_member_id_to'] != $u
        && $cfc['c_member_id_from'] != $u) {
        handle_kengen_error();
    }
    //---

	_do_delete_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id, $u);

    //msg=4 "承認依頼を削除しました。"
    client_redirect("ktai_page.php?p=h_confirm_list&msg=4&$tail");
}

?>