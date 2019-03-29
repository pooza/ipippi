<?php
//---------------------------------------------------------------------------
/**
コミュニティを友人に教える

[引数]
target_c_commu_id
body
c_member_id_list

[リダイレクト先]
c_home

[リダイレクト引数]

[権限]
コミュニティメンバー

*/

function doAction_c_invite_insert_c_message_commu_invite($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	$body = $requests['body'];
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	if(null == $target_c_member_id){
		//msg=7 "教える友人を選択してださい。"
		client_redirect("ktai_page.php?p=c_invite&target_c_commu_id=$target_c_commu_id&msg=7&$tail");
		exit();
	}

	if(null == $body){
		//msg=8 "メッセージを入力してください。"
		client_redirect("ktai_page.php?p=c_invite&target_c_commu_id=$target_c_commu_id&msg=8&$tail");
		exit();
	}

    //--- 権限チェック
    //フレンド

    $status = db_common_friend_status($u, $target_c_member_id);
    if (!$status['is_friend']) {
        handle_kengen_error();
    }
    //---


	$c_member_from = db_common_c_member4c_member_id($u);

    $subject ="コミュニティおすすめメッセージ";

	//PC版のURLを挿入する    
    $url = ABSOLUTE_PATH."page.php?p=c_home&target_c_commu_id=$target_c_commu_id";
    $body_disp =
        $c_member_from['nickname']." さんからおすすめコミュニティのメッセージが届いています。\n".
        "\n".
        "メッセージ：\n".
        $body."\n".
        "\n".
        "このコミュニティのURL\n".
        "$url";

    do_common_send_message($u, $target_c_member_id, $subject, $body_disp);

	client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
}

