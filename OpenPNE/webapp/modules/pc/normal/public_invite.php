<?php
function normalAction_public_invite($smarty,$requests)
{
	// オープン制のSNS以外では無効
	if (IS_CLOSED_SNS) {
		client_redirect_login();
		exit;
	}
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
	//>

	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header', fetch_inc_page_header("public"));

	$smarty->assign('SNS_NAME', SNS_NAME);

	$smarty->ext_display("public_invite.tpl");
}

