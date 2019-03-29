<?php

function pageAction_h_review_list_product($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_review_id = $requests['c_review_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------
	$page_size = 30;
	$page = $page + $direc;

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->assign('c_review', p_h_review_list_product_c_review4c_review_id($c_review_id));

	list($c_review_list, $is_prev, $is_next, $total_num, $start_num, $end_num) = p_h_review_list_product_c_review_list4c_review_id($c_review_id, $page, $page_size);
	$smarty->assign('c_review_list', $c_review_list);
	$smarty->assign("is_prev", $is_prev);
	$smarty->assign("is_next", $is_next);
	$smarty->assign("page", $page);
	$smarty->assign("total_num", $total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);

	$smarty->ext_display('h_review_list_product.tpl');
}

