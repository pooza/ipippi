<?php

function pageAction_f_invite($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_member_id = $requests['target_c_member_id'];
		  
	$smarty->assign('inc_navi',fetch_inc_navi("f", $target_c_member_id));

	//メンバー情報
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));
	
	//招待する友達リスト
	$smarty->assign("f_invite_list",
		p_f_invite_invite_list4c_member_ids($target_c_member_id, $u));

	$smarty->ext_display("f_invite.tpl");
}
?>
