<?php


//---------------------------------------------------------------------------
function pageAction_c_join_request($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));


	//メンバー情報
	$smarty->assign("member", db_common_c_member4c_member_id($u));

	//コミュニティID
	$smarty->assign("c_commu_id", $target_c_commu_id);

	//community情報
	$smarty->assign("c_commu", p_c_join_request_c_commu4c_commu_id($target_c_commu_id));


	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("c_join_request.tpl");

}

