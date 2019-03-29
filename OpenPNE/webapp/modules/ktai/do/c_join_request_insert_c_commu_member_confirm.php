<?php
//---------------------------------------------------------------------------
/**
コミュニティ参加リクエスト

[引数]
target_c_commu_id
body

[リダイレクト先]
c_home

[リダイレクト引数]

[権限]
全メンバー

*/
function doAction_c_join_request_insert_c_commu_member_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	$body = $requests['body'];
	// ----------

	$c_member_id_from = $u;

    //--- 権限チェック
    //コミュニティメンバーでない and 参加承認中でない

    $status = db_common_commu_status($u, $target_c_commu_id);
    if ($status['is_commu_member'] ||
    	$status['is_commu_member_confirm']) {
        handle_kengen_error();
    }
    //---


	if($body == null){
		//msg=1
		client_redirect("ktai_page.php?p=c_join_request&target_c_commu_id=$target_c_commu_id&msg=1&$tail");
		exit();
	}

	do_c_join_request_insert_c_commu_member_confirm($target_c_commu_id, $c_member_id_from, $body);

	//メッセージ
	$c_commu		= do_common_c_commu4c_commu_id($target_c_commu_id);
	$c_member_id_to = $c_commu['c_member_id_admin'];
	$c_member_from	= db_common_c_member4c_member_id($c_member_id_from);

	$subject ="コミュニティ参加要請メッセージ";
	$body_disp =
		$c_member_from['nickname']." さんから ".$c_commu['name']." コミュニティへの参加希望メッセージが届いています。\n".
		"\n".
		"メッセージ：\n".
		$body."\n".
		"\n".
		"この要請について、承認待ちリストから承認または拒否を選択してください。\n";

	do_common_send_message_syoudaku($c_member_id_from, $c_member_id_to, $subject, $body_disp);


    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
}

