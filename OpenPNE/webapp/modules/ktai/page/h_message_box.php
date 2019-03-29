<?php
function pageAction_h_message_box($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	$direc_r = $requests['direc_r'];
	$page_r = $requests['page_r'];
	$direc_s = $requests['direc_s'];
	$page_s = $requests['page_s'];
	// ----------

	// 1ページ当たりに表示するメッセージ数
	$page_size = 5;
	
	$page_r += $direc_r;
	$page_s += $direc_s;
	
	$list_r = k_p_h_message_box_c_message_received_list4c_member_id4range($u, $page_size, $page_r);
	$smarty->assign("c_message_received_list", $list_r[0]);
	$smarty->assign("page_r", $page_r);
	$smarty->assign("is_prev_r",$list_r[1]);
	$smarty->assign("is_next_r",$list_r[2]);
	$smarty->assign("count_messages_received", $list_r[3]);
	
	$list_s = k_p_h_message_box_c_message_sent_list4c_member_id4range($u, $page_size, $page_s);
	$smarty->assign("c_message_sent_list", $list_s[0]);
	$smarty->assign("page_s", $page_s);
	$smarty->assign("is_prev_s",$list_s[1]);
	$smarty->assign("is_next_s",$list_s[2]);
	$smarty->assign("count_messages_sent", $list_s[3]);
	
	$smarty->ext_display("h_message_box.tpl");
}

?>