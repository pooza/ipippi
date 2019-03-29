<?php
// 管理画面ログイン

function normalAction_login(&$smarty,$requests)
{
	$v = array();

	$v['inc_header'] = admin_fetch_inc_header('', false);
	$v['inc_footer'] = admin_fetch_inc_footer();
	$v['module_name'] = $GLOBALS['__Framework']['current_module'];

	$smarty->assign($v);
	$smarty->assign_by_ref('hash_tbl', AdminHashTable::singleton());

	$smarty->ext_display("login.tpl");
}

