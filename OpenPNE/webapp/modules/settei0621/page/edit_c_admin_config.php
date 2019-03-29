<?php
// 設定変更


function pageAction_edit_c_admin_config(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['c_admin_config'] = db_admin_c_admin_config_all();
	$v['c_admin_config']['DAILY_NEWS_DAY'] =
		explode(',', $v['c_admin_config']['DAILY_NEWS_DAY']);
	
	if (empty($v['c_admin_config']['ADMIN_EMAIL']))
		$v['c_admin_config']['ADMIN_EMAIL'] = 'sns@'.MAIL_SERVER_DOMAIN;
	
	$smarty->assign($v);
	$smarty->ext_display("edit_c_admin_config.tpl");
}

?>