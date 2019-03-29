<?php


//---------------------------------------------------------------------------
	//	File:h_search_list.tpl
//---------------------------------------------------------------------------
function pageAction_h_search_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('profile_list', db_common_c_profile_list());
	$smarty->assign('count_list', p_h_search_list_count_c_member_profile());

	$smarty->ext_display("h_search_list.tpl");
}
?>
