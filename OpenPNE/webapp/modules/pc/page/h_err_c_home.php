<?php

//---------------------------------------------------------------------------
function pageAction_h_err_c_home($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->ext_display("h_err_c_home.tpl");
}
?>
