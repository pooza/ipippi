<?php
function normalAction_login_do_login($smarty,$requests)
{
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	$smarty->assign("INC_PAGE_HEADER", p_inc_c_banner_header4null());
	$smarty->assign('IS_CLOSED_SNS', IS_CLOSED_SNS);
	$smarty->assign("top_banner_html", p_common_c_siteadmin4target_pagename("top_banner_html"));
	
	$smarty->assign('inc_page_footer',
		p_common_c_siteadmin4target_pagename('inc_page_footer_before'));
	$smarty->ext_display('login.tpl');
}
?>
