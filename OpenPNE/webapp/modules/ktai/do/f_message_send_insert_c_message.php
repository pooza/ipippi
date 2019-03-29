<?php
//---------------------------------------------------------------------------------
/**
メッセージ送信

[引数]
c_member_id_to
subject
body

[リダイレクト]
f_home

[リダイレクト引数]
target_c_member_id

[権限]
全ユーザー

*/
function doAction_f_message_send_insert_c_message($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$c_member_id_to = $requests['c_member_id_to'];
	$subject = $requests['subject'];
	$body = $requests['body'];
	// ----------

	//--- 権限チェック
	//自分以外

	if ($c_member_id_to == $u) {
		handle_kengen_error();
	}

	// アクセスブロック
	if(p_common_is_access_block($u, $c_member_id_to)){
		client_redirect("ktai_page.php?p=h_access_block&$tail");
		exit;
	}
	//---

	if(is_null($subject) || $subject === ''){
		//msg=2 "タイトルを入力して下さい。"
		client_redirect("ktai_page.php?p=f_message_send&target_c_member_id=$c_member_id_to&msg=2&$tail");
		exit();
	}

	if(is_null($body) || $body === ''){
		//msg=1 "本文を入力して下さい"
		client_redirect("ktai_page.php?p=f_message_send&target_c_member_id=$c_member_id_to&msg=1&$tail");
		exit();
	}

	do_common_send_message($u,$c_member_id_to,$subject,$body);

	client_redirect("ktai_page.php?p=f_home&target_c_member_id=$c_member_id_to&$tail");
}

