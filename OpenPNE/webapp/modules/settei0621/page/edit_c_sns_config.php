<?php
// c_sns_config を編集


function pageAction_edit_c_sns_config(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['c_sns_config'] = db_select_c_sns_config();
	
	$v['border_names'] = array();
	for ($i = 0; $i <= 10; $i++) {
		$v['border_names'][] = sprintf("border_%02d", $i);
	}
	$v['bg_names'] = array();
	for ($i = 0; $i <= 10; $i++) {
		$v['bg_names'][] = sprintf("bg_%02d", $i);
	}
	
	$v['inc_custom_css'] = p_common_c_siteadmin4target_pagename('inc_custom_css');
	
	$smarty->assign($v);
	$smarty->ext_display("edit_c_sns_config.tpl");
}

