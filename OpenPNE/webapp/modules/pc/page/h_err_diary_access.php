<?php

//---------------------------------------------------------------------------
function pageAction_h_err_diary_access($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->ext_display("h_err_diary_access.tpl");
}
?>
