<?php


//---------------------------------------------------------------------------
function pageAction_c_join_request($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));


	//���С�����
	$smarty->assign("member", db_common_c_member4c_member_id($u));

	//���ߥ�˥ƥ�ID
	$smarty->assign("c_commu_id", $target_c_commu_id);

	//community����
	$smarty->assign("c_commu", p_c_join_request_c_commu4c_commu_id($target_c_commu_id));


	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("c_join_request.tpl");

}
?>
