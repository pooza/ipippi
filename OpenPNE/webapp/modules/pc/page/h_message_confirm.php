<?php

//---------------------------------------------------------------------------
function pageAction_h_message_confirm($smarty, $requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_message_id = $requests['target_c_message_id'];
	$form_val['target_c_member_id'] = $requests['target_c_member_id'];
	$form_val['subject'] = $requests['subject'];
	$form_val['body'] = $requests['body'];
	// ----------
	$target_c_member_id = $form_val['target_c_member_id'];

	$msg = "";
	if (null == $requests['subject']) {
		$msg = "件名を入力してください。";
	}

	if (null == $requests['body']) {
		if (!empty ($msg)) {
			$msg .= "<br>";
		}
		$msg .= "メッセージを入力してください。";
	}

	if ($msg) {
		$_REQUEST['msg'] = $msg;
		module_execute('pc', 'page', "h_message");
		exit;
	}

	$smarty->assign('inc_navi', fetch_inc_navi("f", $target_c_member_id));

	//ターゲット情報
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	//ターゲットのid
	$smarty->assign("target_c_member_id", $form_val['target_c_member_id']);
	$smarty->assign("target_c_message_id", $target_c_message_id);

	$smarty->assign("form_val", $form_val);

	//---- ページ表示 ----//
	$smarty->ext_display("h_message_confirm.tpl");

}
?>
