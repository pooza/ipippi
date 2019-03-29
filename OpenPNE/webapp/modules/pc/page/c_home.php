<?php

//---------------------------------------------------------------------------
function pageAction_c_home($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------
    $c_commu = p_common_c_commu4c_commu_id($target_c_commu_id);

	//���ߥ�˥ƥ���¸�ߤ�̵ͭ
    if (!$c_commu) {
        client_redirect("page.php?p=h_err_c_home");
        exit;
    }
	
	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	$smarty->assign("is_c_commu_admin", p_common_is_c_commu_admin4c_member_id($target_c_commu_id,$u) );
	$smarty->assign("is_c_commu_member", p_common_is_c_commu_member4c_commu_idAc_member_id($target_c_commu_id,$u) );
	$smarty->assign("is_c_commu_view", p_common_is_c_commu_view4c_commu_idAc_member_id($target_c_commu_id,$u) );
	$smarty->assign("is_receive_mail", p_c_home_is_receive_mail4c_commu_id4c_member_id($target_c_commu_id, $u));
	$smarty->assign("is_receive_mail_pc", p_c_home_is_receive_mail_pc4c_commu_id4c_member_id($target_c_commu_id, $u));

	//���ߥ�˥ƥ��ȥå�
	$c_commu = p_c_home_c_commu4c_commu_id( $target_c_commu_id );
	$smarty->assign("c_commu", $c_commu);

	//���ߥ�˥ƥ����С�
	$smarty->assign( "c_commu_member_list", p_c_home_c_commu_member_list4c_commu_id($target_c_commu_id, 9));

	//���å��ߥ�˥ƥ��ο���ȥԥå��񤭹���
	$smarty->assign("new_topic_comment", p_c_home_new_topic_comment4c_commu_id($target_c_commu_id, 7));
	//���å��ߥ�˥ƥ��ο��奤�٥�Ƚ񤭹���
	$smarty->assign("new_topic_comment_event", p_c_home_new_topic_comment4c_commu_id($target_c_commu_id, 7, 1));
	//���å��ߥ�˥ƥ��ο��太�������ӥ塼
	$smarty->assign("new_commu_review", p_c_home_new_commu_review4c_commu_id($target_c_commu_id, 7));

	// inc_entry_point
	$smarty->assign('inc_entry_point', fetch_inc_entry_point_c_home());
	
	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("c_home.tpl");
}
?>
