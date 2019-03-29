<?php
// プロフィール項目追加


function pageAction_insert_c_profile(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$smarty->assign($v);
	$smarty->ext_display("insert_c_profile.tpl");
}

