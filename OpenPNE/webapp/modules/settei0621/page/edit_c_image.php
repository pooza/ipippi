<?php
// c_image に画像を登録、削除


function pageAction_edit_c_image(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['SNS_NAME'] = SNS_NAME;
	$v['is_image'] = db_admin_is_c_image4filename($requests['filename']);
	
	$smarty->assign($v);
	$smarty->ext_display("edit_c_image.tpl");
}

?>