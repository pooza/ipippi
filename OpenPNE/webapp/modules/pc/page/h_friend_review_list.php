<?php

function pageAction_h_friend_review_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$page = $requests['page'];
		$direc = $requests['direc'];
		// ----------

		$page_size = 30;
		$page = $page + $direc;

		$smarty->assign('inc_navi',fetch_inc_navi("h"));

		list($c_friend_review_list, $is_prev, $is_next, $total_num, $start_num, $end_num)
			=p_h_home_c_friend_review_list_more4c_member_id($u,$page, $page_size);
		$smarty->assign("is_prev", $is_prev);
		$smarty->assign("is_next", $is_next);
		$smarty->assign("page", $page);
		$smarty->assign("total_num", $total_num);
		$smarty->assign('start_num', $start_num);
		$smarty->assign('end_num', $end_num);
		$smarty->assign('c_friend_review_list', $c_friend_review_list);

		$smarty->ext_display("h_friend_review_list.tpl");
}
?>
