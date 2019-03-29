<?php
function pageAction_h_message_send($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	//ランダム５０人のフレンド
	$smarty->assign("c_friend_list", k_p_h_message_send_c_friend_list_random4c_member_id($u));

	$smarty->ext_display("h_message_send.tpl");
}

