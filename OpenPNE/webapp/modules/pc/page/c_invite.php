<?php


//---------------------------------------------------------------------------
function pageAction_c_invite($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	$body = $requests['body'];
	$c_member_id_list = $requests['c_member_id_list'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));


	//���С�����
	$smarty->assign("member", db_common_c_member4c_member_id($u));

	//���ߥ�˥ƥ�ID
	$smarty->assign("c_commu_id", $target_c_commu_id);

	//���ߥ�˥ƥ�
	$smarty->assign("c_commu", p_c_invite_c_commu4c_commu_id($target_c_commu_id));

	//���Ԥ���ͧã�ꥹ��
	$smarty->assign("c_invite_list", p_c_invite_invite_list4c_member_id4c_commu_id($u,$target_c_commu_id));

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("c_invite.tpl");

}
?>
