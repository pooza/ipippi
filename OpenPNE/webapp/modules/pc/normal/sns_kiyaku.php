<?php
function normalAction_sns_kiyaku($smarty,$requests)
{
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	
	$smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('sns_kiyaku'));
	
	$smarty->assign('sns_name', SNS_NAME);
	$smarty->ext_display("sns_kiyaku.tpl");
}
?>