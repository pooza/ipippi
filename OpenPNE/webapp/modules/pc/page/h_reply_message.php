<?php

function pageAction_h_reply_message($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->ext_display("h_reply_message.tpl");
}

