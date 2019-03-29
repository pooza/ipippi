<?php
function normalAction_password_query($smarty,$requests)
{
	$smarty->assign('password_query_list',p_common_c_password_query4null());
	$smarty->ext_display("password_query.tpl");
}

