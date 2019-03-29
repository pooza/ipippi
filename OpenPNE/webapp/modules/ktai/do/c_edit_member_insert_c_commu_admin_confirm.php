<?php
//-------------------------------------------------------------------
function doAction_c_edit_member_insert_c_commu_admin_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	$target_c_commu_id = $requests['target_c_commu_id'];
	$body = $requests['body'];
	// ----------

    //--- 権限チェック
    //コミュニティ管理者
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    //---


    $target_c_commu_admin_confirm_id =
        do_c_admin_request_insert_c_commu_admin_confirm($target_c_commu_id,$target_c_member_id,$body);

    //メッセージ
    $c_member_id_from = $u;
    $c_member_from    = db_common_c_member4c_member_id($c_member_id_from);
    $c_member_to      = $target_c_member_id;
    $c_commu          = do_common_c_commu4c_commu_id($target_c_commu_id);

    $subject ="コミュニティ管理者交代要請メッセージ";
    $body_disp =
        $c_member_from['nickname']." さんからさんから".$c_commu['name']." コミュニティの管理者交代希望メッセージが届いています。\n".
        "\n".
        "メッセージ：\n".
        $body."\n".
        "\n".
        "この要請について、承認待ちリストから承認または拒否を選択してください。\n";

    do_common_send_message_syoudaku($c_member_id_from, $target_c_member_id, $subject, $body_disp);

    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
}

?>