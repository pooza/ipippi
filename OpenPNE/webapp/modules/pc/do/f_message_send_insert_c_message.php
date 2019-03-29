<?php
//---------------------------------------------------------------------------
/**
メッセージ送信

[引数]
c_member_id_to
title
body

[リダイレクト]
f_home

[リダイレクト引数]
target_c_member_id

[権限]
全ユーザー

*/
//shou050617
function doAction_f_message_send_insert_c_message($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_member_id_to = $request['c_member_id_to'];
	$subject = $request['subject'];
	$body = $request['body'];
	// ----------

	$msg1 = "";
	$msg2 = "";

	if (null == $subject) {
		$msg1 = "件名を入力してください。";
	}
	if (null == $body){
		$msg2 = "メッセージを入力してください。";
	}

	if ($msg1 || $msg2) {
		$url = "page.php?p=f_message_send" .
			"&target_c_member_id=".$c_member_id_to .
			"&target_c_message_id=".$request['target_c_message_id'].
			"&jyusin_c_message_id=".$request['jyusin_c_message_id'].
			"&body=".urlencode($request['body']).
			"&subject=".urlencode($request['subject']).
			"&msg1=".urlencode($msg1).
			"&msg2=".urlencode($msg2);
		client_redirect($url);
		exit;
	}

	//修正
	if ($request['no']) {
		$url = "page.php?p=f_message_send" .
			"&target_c_member_id=".$c_member_id_to .
			"&target_c_message_id=".$request['target_c_message_id'].
			"&jyusin_c_message_id=".$request['jyusin_c_message_id'].
			"&body=".urlencode($request['body']).
			"&subject=".urlencode($request['subject']);
		client_redirect($url);
		exit;
	}

	//--- 権限チェック
	//送信先が自分以外

	if ($c_member_id_to == $u) {
		handle_kengen_error();
	}
	
    //アクセスブロック設定
	if (p_common_is_access_block($u, $c_member_id_to)) {
		client_redirect("page.php?p=h_access_block");
		exit;
	}
	//---

	//返信済みにする
	if ($request['jyusin_c_message_id']) {
		do_update_is_hensin($request['jyusin_c_message_id']);
	}

	//下書き保存が存在しない
	if ($request['target_c_message_id'] == $request['jyusin_c_message_id']) {
		do_common_send_message($u, $c_member_id_to, $subject, $body);
	} else {
		update_message_to_is_save($request['target_c_message_id'], $subject, $body, 1);
	}

	client_redirect("page.php?p=h_reply_message&msg=1");
}

