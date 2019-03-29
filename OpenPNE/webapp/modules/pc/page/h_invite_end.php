<?php

//---------------------------------------------------------------------------
function pageAction_h_invite_end($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('SNS_NAME', SNS_NAME);

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("h_invite_end.tpl");
}
?>
