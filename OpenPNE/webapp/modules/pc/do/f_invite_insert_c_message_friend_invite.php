<?php
//---------------------------------------------------------------------------
function doAction_f_invite_insert_c_message_friend_invite($request) {
	$u = $GLOBALS['AUTH']->uid();

    
	// --- リクエスト変数
	$target_c_member_id = $request['target_c_member_id'];
	$body = $request['body'];
	$c_member_id_list = $request['c_member_id_list'];
	// ----------
    
    if(!$c_member_id_list){
        $msg = urlencode("教える".WORD_MY_FRIEND."を選択してださい。");
        client_redirect("page.php?p=f_invite&target_c_member_id=$target_c_member_id&msg=$msg");
        exit;
    }
    
    if(is_null($body) || $body === ''){
        $msg = urlencode("メッセージを入力してください");
        client_redirect("page.php?p=f_invite&target_c_member_id=$target_c_member_id&msg=$msg");
        exit;
    }

	//--- 権限チェック
	//フレンド

	foreach ($c_member_id_list as $c_member_id) {
		if (!_db_is_friend($c_member_id, $u)) {
			handle_kengen_error();
		}
	}
	//---
    
    $c_member_from = db_common_c_member4c_member_id_LIGHT($u);

    $subject = "メンバー紹介メッセージ";
    $url = ABSOLUTE_PATH."page.php?p=f_home&target_c_member_id=$target_c_member_id";

// メッセージ本文
$message_body = <<<EOD
{$c_member_from['nickname']}さんからメンバー紹介メッセージが届いています。

メッセージ：
$body

このメンバーのURL：
$url
EOD;

    foreach($c_member_id_list as $key => $value){
        do_common_send_message_syoukai_member($u, $value, $subject, $message_body);
    }
    
    client_redirect("page.php?p=f_home&target_c_member_id=$target_c_member_id");
}

