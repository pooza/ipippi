<?php

function normalAction_tologin($smarty,$requests)
{
	// リダイレクト
	header("Refresh: 3; URL=" . get_login_url());
	
	
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	
	$msg = "";
	switch ($requests['error_code']) {
	case "login_failed":
		$msg = "ログインに失敗しました。再度、ログイン操作を行ってください。";
		break;
	}
	if ($msg) $smarty->assign('msg', $msg);
	
	$smarty->assign("login_url", get_login_url());
	$smarty->ext_display('tologin.tpl');
}


