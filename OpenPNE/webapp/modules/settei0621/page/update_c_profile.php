<?php
// プロフィール項目編集

function pageAction_update_c_profile(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();

	$v['c_profile'] = db_admin_c_profile4c_profile_id($requests['c_profile_id']);

	$smarty->assign($v);
	$smarty->ext_display("update_c_profile.tpl");
}

