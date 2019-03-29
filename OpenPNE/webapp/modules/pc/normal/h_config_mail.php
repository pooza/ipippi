<?php
function normalAction_h_config_mail($smarty,$requests)
{
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	
	$smarty->ext_display("h_config_mail.tpl");
}
