<?php
function pageAction_h_confirm_list($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	//��󥯾�ǧ�Ԥ��ꥹ��
	$smarty->assign("anatani_c_friend_confirm_list", k_p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($u));
	
	//���ߥ�˥ƥ����þ�ǧ�Ԥ��ꥹ��
	$smarty->assign("anatani_c_commu_member_confirm_list", k_p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($u));
	
    // ���ʤ��˥��ߥ�˥ƥ������Ը�����˾���Ƥ�����С�
    $smarty->assign("anatani_c_commu_admin_confirm_list",
        p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u));
    
	//��󥯿����Ф����ͤΥꥹ��
	$smarty->assign("anataga_c_friend_confirm_list", k_p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($u));
	
	//���ÿ����Ф������ߥ�˥ƥ��˴ؤ���ꥹ��
	$smarty->assign("anataga_c_commu_member_confirm_list", k_p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($u));

    // ���ʤ������ߥ�˥ƥ������Ը�����������Ƥ�����С�
    $smarty->assign("anataga_c_commu_admin_confirm_list",
        p_h_confirm_list_anataga_c_commu_admin_confirm_list4c_member_id($u));
	
	
	$smarty->ext_display("h_confirm_list.tpl");
	
}

?>