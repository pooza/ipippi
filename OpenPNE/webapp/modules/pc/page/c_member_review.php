<?php

function pageAction_c_member_review($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_id = $requests['target_c_commu_id'];
	$page = $requests['page'];
	$direc = $requests['direc'];
	// ----------
	$page_size=20;
	$page += $direc;

	$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
	list($c_member_review, $is_prev, $is_next, $total_num, $start_num, $end_num)
		 = p_c_member_review_c_member_review4c_commu_id($c_commu_id, $page, $page_size);
	$smarty->assign('c_member_review', $c_member_review);
	$smarty->assign("is_prev", $is_prev);
	$smarty->assign("is_next", $is_next);
	$smarty->assign("page", $page);
	$smarty->assign("total_num", $total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);

	$c_commu = p_common_c_commu4c_commu_id($c_commu_id);
	$smarty->assign('c_commu', $c_commu);
	$smarty->assign("is_c_commu_member", p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id,$u) );

	$smarty->ext_display('c_member_review.tpl');
}

