<?php

function pageAction_h_config_ktai($smarty,$requests) {

	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('mail_server_domain', MAIL_SERVER_DOMAIN);
	$smarty->assign('SNS_NAME', SNS_NAME);

	$smarty->ext_display("h_config_ktai.tpl");
}

