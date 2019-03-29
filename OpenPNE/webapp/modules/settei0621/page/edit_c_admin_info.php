<?php
// おしらせなど更新


function pageAction_edit_c_admin_info(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['c_siteadmin'] = db_admin_c_siteadmin($requests['target']);
	
	$smarty->assign($v);
	$smarty->ext_display("edit_c_admin_info.tpl");
}

