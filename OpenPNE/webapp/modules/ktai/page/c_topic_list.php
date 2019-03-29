<?php

function pageAction_c_topic_list($smarty,$requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$c_commu_id = $requests['target_c_commu_id'];
	$page = $requests['page'];
	$direc = $requests['direc'];
	// ----------

	//--- 権限チェック
	//掲示板閲覧権限
	if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id, $u)) {
		handle_kengen_error();
	}

	$page_size = 10;
	$page += $direc;
	
	$smarty->assign('c_commu', p_common_c_commu4c_commu_id($c_commu_id));

	list($result, $is_prev, $is_next, $total_num, $start_num, $end_num)
		 = p_c_topic_list_c_topic_list4target_c_commu_id($c_commu_id,$page,$page_size, $u);
	$smarty->assign("c_topic_list",$result);
	$smarty->assign("is_prev", $is_prev);
	$smarty->assign("is_next", $is_next);
	$smarty->assign("page", $page);
	$smarty->assign("total_num",$total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);
	
	$smarty->ext_display("c_topic_list.tpl");
}

