<?php

//---------------------------------------------------------------------------
function pageAction_c_edit_member($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	//--- ���¥����å�
	//���ߥ�˥ƥ�������
	if (!_db_is_c_commu_admin($target_c_commu_id, $u)) {
	    handle_kengen_error();
	}
	//---

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	//���С�����
	$smarty->assign("member", db_common_c_member4c_member_id($u));

	//���ߥ�˥ƥ�ID
	$smarty->assign("c_commu_id", $target_c_commu_id);

	//���ߥ�˥ƥ�����
	$smarty->assign("c_commu", p_c_edit_member_c_commu4c_commu_id($target_c_commu_id));
	$page_size = 20;

	$page += $direc;

	//���ߥ�˥ƥ����Хꥹ��
	$list = p_c_edit_member_c_member_list4c_commu_id($target_c_commu_id, $page_size, $page);
	$smarty->assign("c_member_list", $list[0]);
	$smarty->assign("is_prev", $list[1]);
	$smarty->assign("is_next", $list[2]);
	$smarty->assign("page", $page);

	$smarty->ext_display("c_edit_member.tpl");
}
?>
