<?php
function normalAction_h_config_mail($smarty,$requests)
{
	//---- inc_ �ƥ�ץ졼���� �ѿ� ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	
	$smarty->ext_display("h_config_mail.tpl");
}
?>