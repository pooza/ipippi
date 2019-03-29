<?php
// プロフィール項目追加

function pageAction_update_c_banner(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();

	$v['c_banner'] = _db_c_banner4c_banner_id($requests['c_banner_id']);

	$smarty->assign($v);
	$smarty->ext_display("update_c_banner.tpl");
}

