<?php

//---------------------------------------------------------------------------
function pageAction_h_diary_list_friend($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	//日記一覧
	$page = $page + $direc;
	$page_size = 50;
	$smarty->assign("page_size",$page_size);

	$lst = p_h_diary_list_friend_h_diary_list_friend4c_member_id($u,$page_size,$page,30);
	$smarty->assign("h_diary_list_friend", $lst[0]);
	$smarty->assign("is_prev", $lst[1]);
	$smarty->assign("is_next", $lst[2]);
	$smarty->assign("total_num", $lst[3]);

	$smarty->assign("page", $page);
	$pager = array();
	$pager['start'] = $page_size * ($page - 1) + 1;
	if (($pager['end'] = $page_size * $page) > $lst[3]) {
		$pager['end'] = $lst[3];
	}
	$smarty->assign('pager', $pager);

	if ($page == 1) {
		// rss_cache
		$limit = 20;
		$smarty->assign('c_rss_cache_list', p_h_diary_list_friend_c_rss_cache_list($u, $limit));
	}

	$smarty->ext_display("h_diary_list_friend.tpl");
}

