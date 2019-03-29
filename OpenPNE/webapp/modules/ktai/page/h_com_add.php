<?php
function pageAction_h_com_add($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	//カテゴリのリスト
	$smarty->assign("c_commu_category_list", _db_c_commu_category4null());

	$smarty->ext_display("h_com_add.tpl");
}

