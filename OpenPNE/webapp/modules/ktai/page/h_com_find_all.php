<?php
function pageAction_h_com_find_all($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	//最新書き込みコミュニティ５件
	$smarty->assign("c_commu_list_lastupdated", k_p_h_com_find_all_c_commu_list_lastupdated(5));

	//子カテゴリのリスト
	$smarty->assign("c_commu_category_list", _db_c_commu_category4null());
	//親カテゴリのリスト
	$smarty->assign('c_commu_category_parent_list',_db_c_commu_category_parent_list4null());

	$smarty->ext_display("h_com_find_all.tpl");

}

