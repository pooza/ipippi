<?php

//---------------------------------------------------------------------------
	//	File:c_join_commu_2.tpl
//---------------------------------------------------------------------------
function pageAction_c_join_commu_2($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	$smarty->assign('target_c_commu_id', $target_c_commu_id);
	$smarty->assign('c_commu', p_common_c_commu4c_commu_id($target_c_commu_id));

	$smarty->ext_display("c_join_commu_2.tpl");
}

