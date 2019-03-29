<?php
// 画像リスト


function pageAction_list_c_image(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	$pager = array();
	
	$v['SNS_NAME'] = SNS_NAME;
	
	$v['c_image_list'] = db_admin_c_image_list($requests['page'], $requests['page_size'], $pager);
	$v['pager'] = $pager;
	
	$smarty->assign($v);
	$smarty->ext_display("list_c_image.tpl");
}

