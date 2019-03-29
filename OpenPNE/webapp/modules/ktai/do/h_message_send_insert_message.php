<?php
//----------------------------------------------------------------------
function doAction_h_message_send_insert_message($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$subject = $requests['subject'];
	$body = $requests['body'];
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	if (is_null($subject) || $subject === ''){
		//msg=2
		client_redirect("ktai_page.php?p=h_message_send&msg=2&$tail");
		exit();
	}

	if (is_null($body) || $body === ''){
		//msg=1
		client_redirect("ktai_page.php?p=h_message_send&msg=1&$tail");
		exit();
	}

	//--- 権限チェック
	//自分以外

	if ($target_c_member_id == $u) {
		handle_kengen_error();
	}
	//---

	$c_member_id_from = $u;

	do_common_send_message($c_member_id_from, $target_c_member_id, $subject,$body);

	client_redirect("ktai_page.php?p=h_message_box&$tail");
}

