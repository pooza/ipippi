<?php
function pageAction_h_message($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	$tail = $GLOBALS['KTAI_URL_TAIL'];

	// --- �ꥯ�������ѿ�
	$target_c_message_id = $requests['target_c_message_id'];
	$from_h_home = $requests['from_h_home'];
	// ----------

	// ��å������ǡ�������
	$c_message = k_p_h_message_c_message4c_message_id($target_c_message_id);

	//--- ���¥����å�
	if ($c_message['c_member_id_from'] != $u &&
		$c_message['c_member_id_to'] != $u) {
		handle_kengen_error();
	}
	//---

	// ���ɤˤ���
	p_h_message_update_c_message_is_read4c_message_id($target_c_message_id, $u);
	
	// ��å������ǡ���
	//���ߥ�˥ƥ����������å�������URL���ִ�
	list($c_message['body'],$com_url,$friend_url) = k_p_h_message_ktai_url4url($c_message['body'],$tail);
	
	$smarty->assign("c_message", $c_message);
	$smarty->assign("com_url", $com_url);
	$smarty->assign("friend_url", $friend_url);
	
	$smarty->ext_display("h_message.tpl");
}

?>