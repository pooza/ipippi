<?php

function pageAction_h_config_easy_login($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	$c_member_secure = db_common_c_member_secure4c_member_id($u);
	
	$smarty->assign('is_registered', !empty($c_member_secure['easy_access_id']));
	$smarty->ext_display('h_config_easy_login.tpl');
}

