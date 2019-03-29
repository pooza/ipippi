<?php
function pageAction_c_edit($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	$c_commu = _db_c_commu4c_commu_id($target_c_commu_id);

	//--- 権限チェック
	if ($c_commu['c_member_id_admin'] != $u) {
		handle_kengen_error();
	}
	//---

	//カテゴリのリスト
	$smarty->assign("c_commu_category_list", _db_c_commu_category4null());

	$smarty->assign("c_commu", $c_commu);
	$smarty->ext_display("c_edit.tpl");
}

