<?php
// プロフィール項目変更


function pageAction_edit_c_profile(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['c_profile_list'] = db_common_c_profile_list();
	
	$smarty->assign($v);
	$smarty->ext_display("edit_c_profile.tpl");
}

?>