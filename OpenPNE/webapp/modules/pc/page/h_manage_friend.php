<?php


//---------------------------------------------------------------------------
	//	File:h_manage_friend.tpl
//---------------------------------------------------------------------------
function pageAction_h_manage_friend($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('c_friend_list',p_h_manage_friend_c_friend_list_disp4c_member_id($u,0) );

	$smarty->ext_display("h_manage_friend.tpl");
}
?>
