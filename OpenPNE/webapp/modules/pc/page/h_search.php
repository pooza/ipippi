<?php


//---------------------------------------------------------------------------
	//	File:h_search.tpl
//---------------------------------------------------------------------------
function pageAction_h_search($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('profile_list', db_common_c_profile_list());

	$smarty->ext_display("h_search.tpl");
}
?>
