<?php
//---------------------------------------------------------------------------
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
function doAction_h_confirm_list_delete_c_friend_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_friend_confirm_id = $request['target_c_friend_confirm_id'];
	// ----------

	//--- 権限チェック
	//リンク承認を送った人 or 受けた人

	$cfc = _do_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id);

	if ($cfc['c_member_id_to'] != $u
		&& $cfc['c_member_id_from'] != $u) {
		handle_kengen_error();
	}
	//---

	_do_delete_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id, $u);

	$msg = urlencode('承認依頼を削除しました');
	client_redirect("page.php?p=h_confirm_list&msg=$msg");
}

