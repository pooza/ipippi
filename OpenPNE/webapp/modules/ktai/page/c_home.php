<?php
function pageAction_c_home($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	$c_commu = p_common_c_commu4c_commu_id($target_c_commu_id);

	//���ߥ�˥ƥ���¸�ߤ�̵ͭ
    if (!$c_commu) {
        client_redirect("ktai_page.php?p=h_home&ksid=" . session_id());
        exit();
    }


	//--- ���¥����å�
	//̤����
    //�Ǽ��Ĥα������¥����å� tpl�Ǥ�äƤ���
    $smarty->assign("is_c_commu_view", p_common_is_c_commu_view4c_commu_idAc_member_id($target_c_commu_id, $u));
    $smarty->assign("is_c_commu_member", p_common_is_c_commu_member4c_commu_idAc_member_id($target_c_commu_id, $u));
	//---

    //��������HTML
    $smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('k_c_home'));
	
	//���ߥ�˥ƥ�����
	$smarty->assign("c_commu", k_p_c_home_c_commu4c_commu_id($target_c_commu_id));
	
	//���ߥ�˥ƥ����Хꥹ��
	$smarty->assign("c_commu_member_list", 
		k_p_c_home_c_commu_member_list_random4c_commu_id($target_c_commu_id, 5));
		
	//���å��ߥ�˥ƥ��ο���ȥԥå��񤭹���
	$smarty->assign("new_topic_comment", p_c_home_new_topic_comment4c_commu_id($target_c_commu_id, 5));
	//���å��ߥ�˥ƥ��ο��奤�٥�Ƚ񤭹���
	$smarty->assign("new_topic_comment_event", p_c_home_new_topic_comment4c_commu_id($target_c_commu_id, 5, 1));
	
	//��ʬ($u)�Ȥ��Υ��ߥ�Ȥδط�
	$smarty->assign("relation_c_member_and_c_commu", 
		k_p_c_home_relationship_between_member_commu($target_c_commu_id, $u));

	//���ߥ�˥ƥ��᡼��(ktai)��������
	$smarty->assign("is_receive_mail", k_p_c_home_is_receive_mail4c_commu_id4c_member_id($target_c_commu_id, $u));
	//���ߥ�˥ƥ��᡼��(pc)��������
	$smarty->assign("is_receive_mail_pc", k_p_c_home_is_receive_mail_pc4c_commu_id4c_member_id($target_c_commu_id, $u));

// /shou
		
	$smarty->ext_display("c_home.tpl");
}

?>