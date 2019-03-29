<?php

function pageAction_h_config_password_query($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	$smarty->assign('password_query_list',p_common_c_password_query4null());
	$smarty->ext_display("h_config_password_query.tpl");
}

