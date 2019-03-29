<?php
function normalAction_regist_intro($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
    //>
	
	// --- リクエスト変数
	$sid = $requests['sid'];
	// ----------

    if (!n_regist_intro_is_active_sid($sid)) {
        $msg = "この招待URLは既に無効になっています。";
        client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
        exit;
    }
	
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	
	$smarty->assign("sid", $sid);
	$smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('sns_kiyaku'));

	$smarty->ext_display("regist_intro.tpl");

}
