<?php

function pageAction_c_event_member_list($smarty,$requests) {
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	$pw = $GLOBALS['KTAI_PASSWD'];
	
	// --- �ꥯ�������ѿ�
	$target_c_commu_topic_id = $requests['target_c_commu_topic_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------
	
	$c_topic = c_event_detail_c_topic4c_commu_topic_id($target_c_commu_topic_id);
	$c_commu_id = $c_topic['c_commu_id'];
	
	$page += $direc;
	$page_size=20;
	
	//�ڡ���
	$smarty->assign("page", $page);
	
	//���ФΥꥹ��
	$list = k_p_c_event_member_list4c_commu_topic_id($target_c_commu_topic_id, $page_size, $page);
	$smarty->assign("c_event_member_list", $list[0]);
	$smarty->assign('is_prev', $list[1]);
	$smarty->assign('is_next', $list[2]);

	//���ߥ�˥ƥ�ID
	$smarty->assign("c_commu_id", $c_commu_id);
	//���٥��ID
	$smarty->assign("c_commu_topic_id", $target_c_commu_topic_id);
	//���ߥ�˥ƥ��Υ��п�
	$smarty->assign("count_member", k_p_count_c_event_member_list4c_commu_topic_id($target_c_commu_topic_id));
	
	$smarty->ext_display("c_event_member_list.tpl");
}
?>
