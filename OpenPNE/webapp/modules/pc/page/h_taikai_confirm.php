<?php

//---------------------------------------------------------------------------
function pageAction_h_taikai_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();
	
	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->ext_display("h_taikai_confirm.tpl");
}
?>
