<?php
function normalAction_password_query($smarty,$requests)
{
	//---- inc_ �ƥ�ץ졼���� �ѿ� ----//
	$smarty->assign('inc_page_header',	fetch_inc_page_header("public") );
	
	$smarty->assign('c_password_query_list', p_common_c_password_query4null());
	
	$smarty->ext_display("password_query.tpl");
}
?>