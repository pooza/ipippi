<?php

//---------------------------------------------------------------------------
function pageAction_h_message($smarty, $requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_message_id = $requests['target_c_message_id'];
	$from_h_home = $requests['from_h_home'];
	$form_val['subject'] = $requests['subject'];
	$form_val['body'] = $requests['body'];
	$box = $requests['box'];
	$jyusin_c_message_id = $requests['jyusin_c_message_id'];
	// ----------

	$form_val['target_c_message_id'] = $target_c_message_id;

	$smarty->assign('inc_navi', fetch_inc_navi("h"));

	// ���ɤˤ���
	p_h_message_update_c_message_is_read4c_message_id($target_c_message_id, $u);

	//---- �������������������¤Υ����å� ----//
	// ��å������ǡ�������
	$c_message = p_h_message_c_message4c_message_id($target_c_message_id, $u);

	if (!$form_val['subject'])
		$form_val['subject'] = "Re:".$c_message['subject'];

	//--- ���¥����å�
	//��å����������� or ��å�����������
	if ($c_message['c_member_id_to'] != $u && $c_message['c_member_id_from'] != $u) {
		client_redirect("page.php?p=h_home");
		exit;
	}
	//---

	// is_syoudaku������о�ǧ�Ԥ��ꥹ�Ȥإ�����쥯��
	if ($c_message['is_syoudaku'] && $from_h_home == 1) {
		client_redirect('page.php?p=h_confirm_list');
		exit;
	}

	//---- �ڡ�������ɽ���� �ѿ� ----//

	// ��å������ǡ���
	$smarty->assign("c_message", $c_message);
	$smarty->assign("form_val", $form_val);
	$smarty->assign("jyusin_c_message_id", $jyusin_c_message_id);

	//�ܥå���Ƚ��
	$smarty->assign("box", $box);

	//---- �ڡ���ɽ�� ----//
	$smarty->ext_display("h_message.tpl");
}
?>
