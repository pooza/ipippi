<?php

//---------------------------------------------------------------------------
function pageAction_h_err_fh_diary($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->ext_display("h_err_fh_diary.tpl");
}
?>
