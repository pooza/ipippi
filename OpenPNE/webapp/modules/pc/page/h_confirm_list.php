<?php



//---------------------------------------------------------------------------
function pageAction_h_confirm_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));


	// ���ʤ��˥ե��ɥ�󥯤��������Ƥ�����С�
	$smarty->assign("anatani_c_friend_confirm_list",
	        p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($u));

	// ���ʤ���(��)�������ߥ�˥ƥ��˻��ä��˾���Ƥ�����С�
	$smarty->assign("anatani_c_commu_member_confirm_list",
	        p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($u));

	// ���ʤ��˥��ߥ�˥ƥ������Ը�����˾���Ƥ�����С�
	$smarty->assign("anatani_c_commu_admin_confirm_list",
	        p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u));


	// ���ʤ����ե��ɥ�󥯤��������Ƥ�����С�
	$smarty->assign("anataga_c_friend_confirm_list",
	        p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($u));

	// ���ʤ������ߥ�˥ƥ������������Ƥ��륳�ߥ�˥ƥ�
	$smarty->assign("anataga_c_commu_member_confirm_list",
	        p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($u));

	// ���ʤ������ߥ�˥ƥ������Ը�����������Ƥ�����С�
	$smarty->assign("anataga_c_commu_admin_confirm_list",
	        p_h_confirm_list_anataga_c_commu_admin_confirm_list4c_member_id($u));


	//---- �ڡ���ɽ�� ----//
	$smarty->ext_display("h_confirm_list.tpl");
}
?>
