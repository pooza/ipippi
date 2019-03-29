<?php
//-------------------------------------------------------------------
function doAction_c_edit_update_c_commu($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	$name = $requests['name'];
	$c_commu_category_id = $requests['c_commu_category_id'];
	$info = $requests['info'];
	$public_flag = $requests['public_flag'];
	// ----------

	//--- 権限チェック
	//コミュニティ管理者

	$status = db_common_commu_status($u, $target_c_commu_id);
	if (!$status['is_commu_admin']) {
		handle_kengen_error();
	}
	//---

	_do_update_c_commu($target_c_commu_id, $u, $name, $c_commu_category_id, $info, $public_flag);

	client_redirect("ktai_page.php?p=c_home&target_c_commu_id={$target_c_commu_id}&{$tail}");
}

