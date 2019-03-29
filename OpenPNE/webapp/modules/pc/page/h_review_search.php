<?php


function pageAction_h_review_search($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$keyword = $requests['keyword'];
	$category = $requests['category'];
	$orderby = $requests['orderby'];
	$page = $requests['page'];
	$direc = $requests['direc'];
	// ----------
	$page_size=20;
	$page += $direc;

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->assign('category_disp',p_h_review_add_category_disp());
	$smarty->assign('category', $category);
	$smarty->assign('keyword', $keyword);
	$smarty->assign('orderby', $orderby);

	list($result, $is_prev, $is_next, $total_num, $start_num, $end_num)
		 = p_h_review_search_result4keyword_category($keyword, $category, $orderby, $page, $page_size);
	$smarty->assign('result', $result);
	$smarty->assign("is_prev", $is_prev);
	$smarty->assign("is_next", $is_next);
	$smarty->assign("page", $page);
	$smarty->assign("total_num", $total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);

	$smarty->ext_display('h_review_search.tpl');	
}
?>
