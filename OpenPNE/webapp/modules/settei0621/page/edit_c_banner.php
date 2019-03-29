<?php
// c_image ¤Ë²èÁü¤òÅÐÏ¿¡¢ºï½ü


function pageAction_edit_c_banner(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['SNS_NAME'] = SNS_NAME;
	$v['is_image'] = db_admin_is_c_image4filename($requests['filename']);
	
	$v['c_banner_top_list'] = db_admin_c_banner_list4null('TOP');
	$v['c_banner_side_list'] = db_admin_c_banner_list4null('SIDE');
	
	$v['cnt_c_banner_top_list'] = count($v['c_banner_top_list']);
	
	$v['top_banner_html'] = p_common_c_siteadmin4target_pagename('top_banner_html');
	$v['side_banner_html'] = p_common_c_siteadmin4target_pagename('side_banner_html');
	
	$smarty->assign($v);
	$smarty->ext_display("edit_c_banner.tpl");
}

?>
