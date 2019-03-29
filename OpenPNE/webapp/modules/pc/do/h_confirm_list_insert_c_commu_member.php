<?php
//---------------------------------------------------------------------------
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
function doAction_h_confirm_list_insert_c_commu_member($request) {
	$u = $GLOBALS['AUTH']->uid();

    
	// --- リクエスト変数
	$target_c_commu_member_confirm_id = $request['target_c_commu_member_confirm_id'];
	// ----------
    $is_receive_mail = $_REQUEST['is_receive_mail'];
    
    //--- 権限チェック
    //コミュニティ参加承認を受けた人
    
    $cmc = _do_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id);
    
    if ($cmc['c_member_id_admin'] != $u) {
        handle_kengen_error();
    }
    // -----
    
    
    do_h_confirm_list_insert_c_commu_member($target_c_commu_member_confirm_id, $u, $is_receive_mail);
    
    $msg = urlencode('承認が完了しました');
    client_redirect("page.php?p=h_confirm_list&msg=$msg");
}

