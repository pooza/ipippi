<?php
//---------------------------------------------------------------------------
/**
メッセージを送る(返信用)

[引数]
subject
body
target_c_member_id
c_message_id

[リダイレクト]
h_message

[リダイレクト引数]
target_c_message_id

[権限]
全ユーザー

*/
function doAction_h_message_insert_message($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$subject = $requests['subject'];
	$body = $requests['body'];
	$target_c_member_id = $requests['target_c_member_id'];
	$target_c_message_id = $requests['c_message_id'];
	// ----------

	if(is_null($subject) || $subject === ''){
		client_redirect("ktai_page.php?p=h_message&target_c_message_id=$target_c_message_id&msg=2&$tail");
		exit;
	}

	if(is_null($body) || $body === ''){
		client_redirect("ktai_page.php?p=h_message&target_c_message_id=$target_c_message_id&msg=1&$tail");
		exit;
	}

	//--- 権限チェック
	//自分以外
	if ($target_c_member_id == $u) {
		handle_kengen_error();
	}
	
	//target_c_messageが自分宛
	$target_c_message = _db_c_message4c_message_id($target_c_message_id);
	if ($target_c_message['c_member_id_to'] != $u) {
		handle_kengen_error();
	}
	
	// アクセスブロック
	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&$tail");
		exit;
	}
	//---

	//返信済みにする
	do_update_is_hensin($target_c_message_id);

	do_common_send_message($u, $target_c_member_id, $subject, $body);

	client_redirect("ktai_page.php?p=h_message_box&$tail");
}

