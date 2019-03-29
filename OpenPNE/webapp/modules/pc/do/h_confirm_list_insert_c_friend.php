<?php
//---------------------------------------------------------------------------
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
function doAction_h_confirm_list_insert_c_friend($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_friend_confirm_id = $request['target_c_friend_confirm_id'];
	// ----------
    
    //--- 権限チェック
    //リンク承認を受けているメンバー
    
    $cfc = _do_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id);
    
    if ($cfc['c_member_id_to'] != $u) {
        handle_kengen_error();
    }
    // -----


	do_h_confirm_list_insert_c_friend($target_c_friend_confirm_id, $u);


	do_h_confirm_list_insert_c_friend_mail_send($cfc['c_member_id_from'], $u);

	$msg = urlencode(WORD_FRIEND.'登録が完了しました');
	client_redirect("page.php?p=f_message_send&target_c_member_id={$cfc['c_member_id_from']}&msg={$msg}");
}

