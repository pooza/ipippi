<?php
// プロフィール項目削除

function pageAction_delete_c_profile(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();

	$smarty->assign($v);
	$smarty->ext_display("delete_c_profile.tpl");
}

