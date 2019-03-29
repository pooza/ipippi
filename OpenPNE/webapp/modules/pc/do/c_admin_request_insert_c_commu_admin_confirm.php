<?php
//---------------------------------------------------------------------------
/**
コミュニティ管理者交代依頼メッセージ送信

[引数]
target_c_commu_id
target_c_member_id
body

[リダイレクト先]
c_edit_member

[リダイレクト引数]
target_c_commu_id

[権限]
コミュ二ティ管理者

*/
function doAction_c_admin_request_insert_c_commu_admin_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $request['target_c_member_id'];
	$target_c_commu_id = $request['target_c_commu_id'];
	// ----------

    //--- 権限チェック
    //自分がコミュニティ管理者
    //targetがコミュニティメンバー
    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }

    $status = db_common_commu_status($target_c_member_id, $target_c_commu_id);
    if (!$status['is_commu_member']) {
        handle_kengen_error();
    }
    //---
    
    
	$target_c_commu_admin_confirm_id = do_c_admin_request_insert_c_commu_admin_confirm($target_c_commu_id,$target_c_member_id);

	//メッセージ
	$c_member_id_from	= $u;
	$c_member_from		= db_common_c_member4c_member_id_LIGHT($c_member_id_from);
	$c_member_to		= $target_c_member_id;
	$c_commu			= do_common_c_commu4c_commu_id($target_c_commu_id);
	
	$subject ="コミュニティ管理者交代要請メッセージ";
	$body_disp =
		$c_member_from['nickname']." さんからさんから".$c_commu['name']." コミュニティの管理者交代希望メッセージが届いています。\n".
		"\n".
		"この要請について、承認待ちリストから承認または拒否を選択してください。\n";
	
	do_common_send_message_syoudaku($c_member_id_from, $target_c_member_id, $subject, $body_disp);

    client_redirect("page.php?p=c_edit_member&target_c_commu_id=$target_c_commu_id");
}

