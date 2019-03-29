<?php
// コミュニティカテゴリ変更


function pageAction_edit_category(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['c_commu_category_parent_list'] = db_admin_c_commu_category_parent_list();
	$v['c_commu_category_list'] = db_admin_c_commu_category_list();
	
	$smarty->assign($v);
	$smarty->ext_display("edit_category.tpl");
}

?>