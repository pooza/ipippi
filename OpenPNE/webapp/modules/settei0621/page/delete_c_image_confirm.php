<?php
// 画像削除(確認画面)


function pageAction_delete_c_image_confirm(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['c_image'] = db_admin_c_image4c_image_id($requests['target_c_image_id']);
	
	$smarty->assign($v);
	$smarty->ext_display("delete_c_image_confirm.tpl");
}

?>
