<?php

//---------------------------------------------------------------------------
function pageAction_h_message_confirm($smarty, $requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_message_id = $requests['target_c_message_id'];
	$form_val['target_c_member_id'] = $requests['target_c_member_id'];
	$form_val['subject'] = $requests['subject'];
	$form_val['body'] = $requests['body'];
	// ----------
	$target_c_member_id = $form_val['target_c_member_id'];

	$msg = "";
	if (null == $requests['subject']) {
		$msg = "��̾�����Ϥ��Ƥ���������";
	}

	if (null == $requests['body']) {
		if (!empty ($msg)) {
			$msg .= "<br>";
		}
		$msg .= "��å����������Ϥ��Ƥ���������";
	}

	if ($msg) {
		$_REQUEST['msg'] = $msg;
		module_execute('pc', 'page', "h_message");
		exit;
	}

	$smarty->assign('inc_navi', fetch_inc_navi("f", $target_c_member_id));

	//�������åȾ���
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	//�������åȤ�id
	$smarty->assign("target_c_member_id", $form_val['target_c_member_id']);
	$smarty->assign("target_c_message_id", $target_c_message_id);

	$smarty->assign("form_val", $form_val);

	//---- �ڡ���ɽ�� ----//
	$smarty->ext_display("h_message_confirm.tpl");

}
?>
