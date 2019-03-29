<?php


//---------------------------------------------------------------------------
//shou050616
function pageAction_f_message_send($smarty, $requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	$form_val['subject'] = $requests['subject'];
	$form_val['body'] = $requests['body'];
	$box = $requests['box'];
	$is_syusei = $requests['is_syusei'];
	$form_val['target_c_message_id'] = $requests['target_c_message_id'];
	$form_val['jyusin_c_message_id'] = $requests['jyusin_c_message_id'];
	// ----------
	$syusei = 0;
	if ($form_val['subject'] && $form_val['body'])
		$syusei = 1;

	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block");
		exit;
	}

	//メッセージIDから情報を取り出す
	if($box == "savebox" && $form_val['target_c_message_id']){
		$tmplist = _db_c_message4c_message_id($form_val['target_c_message_id']);
		$form_val['body'] = $tmplist['body'];
		$form_val['subject'] = $tmplist['subject'];
		$form_val['target_c_message_id'] = $form_val['target_c_message_id'];
		if (!$target_c_member_id) {
			$target_c_member_id = $tmplist['c_member_id_to'];
		}
	}
	elseif (!$syusei && $form_val['target_c_message_id']) {
		$tmplist = _db_c_message4c_message_id($form_val['target_c_message_id']);
		$form_val['body'] = message_body2inyou($tmplist['body']);
		$form_val['subject'] = "Re:".$tmplist['subject'];
		$form_val['target_c_message_id'] = $form_val['target_c_message_id'];
		if (!$target_c_member_id) {
			$target_c_member_id = $tmplist['c_member_id_from'];
		}
	}

	$smarty->assign('inc_navi', fetch_inc_navi("f", $target_c_member_id));

	//ターゲット情報
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	//ターゲットのid
	$smarty->assign("target_c_member_id", $target_c_member_id);
	//ターゲットのid
	$smarty->assign("target_c_message_id", $form_val['target_c_message_id']);

	$smarty->assign("form_val", $form_val);
	$smarty->assign("box", $box);

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("f_message_send.tpl");

}
?>
