<?php
function pageAction_c_member_list($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	$page_size = 20;
	$page += $direc;
	
	//�ڡ���
	$smarty->assign("page", $page);
	
	//���ФΥꥹ��
	$list = k_p_c_member_list_c_members_disp4c_commu_id($target_c_commu_id, $page_size, $page);
	$smarty->assign("c_member_list", $list[0]);
	$smarty->assign("is_prev", $list[1]);
	$smarty->assign("is_next", $list[2]);
	
	//���ߥ�˥ƥ�ID
	$smarty->assign("c_commu_id", $target_c_commu_id);
	//���ߥ�˥ƥ��Υ��п�
	$smarty->assign("count_member", k_p_c_member_list_c_commu_member_count4c_commu_id($target_c_commu_id));
	
	$smarty->ext_display("c_member_list.tpl");
}

?>