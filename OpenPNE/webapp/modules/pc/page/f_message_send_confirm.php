<?php


//shou050616
//---------------------------------------------------------------------------
function pageAction_f_message_send_confirm($smarty, $requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$form_val['target_c_member_id'] = $requests['target_c_member_id'];
	$form_val['subject'] = $requests['subject'];
	$form_val['body'] = $requests['body'];
	$form_val['target_c_message_id'] = $requests['target_c_message_id'];
	$form_val['jyusin_c_message_id'] = $requests['jyusin_c_message_id'];
	$save = $requests['save'];
	// ----------

	$target_c_member_id = $form_val['target_c_member_id'];

	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block");
		exit;

	}

	$smarty->assign('inc_navi', fetch_inc_navi("f", $target_c_member_id));

	//�������åȾ���
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	//�������åȤ�id
	$smarty->assign("target_c_member_id", $form_val['target_c_member_id']);

	$smarty->assign("form_val", $form_val);

	//������¸
	if (!empty ($save)) {

		//������¸��¸�ߤ��ʤ�
		if ($form_val['target_c_message_id'] == $form_val['jyusin_c_message_id']) {

			insert_message_to_is_save($form_val['target_c_member_id'], $u, $form_val['subject'], $form_val['body'], $_REQUEST['jyusin_c_message_id']);
		} else { //������¸��¸�ߤ���

			update_message_to_is_save($form_val['target_c_message_id'], $form_val['subject'], $form_val['body']);
		}

		client_redirect("page.php?p=h_reply_message&msg=2");
		exit ();
	}

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("f_message_send_confirm.tpl");

}
?>