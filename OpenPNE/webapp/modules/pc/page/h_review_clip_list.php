<?php

function pageAction_h_review_clip_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$page = $requests['page'];
	$direc = $requests['direc'];
	// ----------

	$page += $direc;

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	list($c_review_clip_list, $is_prev, $is_next, $total_num, $start_num, $end_num)
		= p_h_review_clip_list_h_review_clip_list4c_member_id($u, $page, 20);
	$smarty->assign('c_review_clip_list', $c_review_clip_list);
	$smarty->assign("is_prev", $is_prev);
	$smarty->assign("is_next", $is_next);
	$smarty->assign("page", $page);
	$smarty->assign("total_num", $total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);

	$smarty->ext_display('h_review_clip_list.tpl');
}

