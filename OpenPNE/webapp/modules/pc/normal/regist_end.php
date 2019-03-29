<?php
function normalAction_regist_end($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
	//>

	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("regist"));

	$smarty->assign("login_url", get_login_url());
	$smarty->ext_display("regist_end.tpl");
}
