<?php

//---------------------------------------------------------------------------
function pageAction_fh_diary_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	$year = $requests['year'];
	$month = $requests['month'];
	$day = $requests['day'];
	// ----------

	if (!$target_c_member_id) {
		$target_c_member_id = $u;
	}

	if($target_c_member_id == $u) {
		$type = 'h';
		$is_diary_admin = true;
		
	} else {
		$type = 'f';
		$is_diary_admin = false;
		$target_c_member = db_common_c_member4c_member_id($target_c_member_id);

		//日記の公開範囲設定
		if (($target_c_member['public_flag_diary'] == "friend" &&
			 !_db_is_friend($u, $target_c_member_id))) {
		    client_redirect("page.php?p=h_err_diary_access");
		    exit;
		}
		
		// アクセスブロック
		if(p_common_is_access_block($u, $target_c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;
		}
		
		//あしあとをつける
		p_etc_do_ashiato($target_c_member_id, $u);
	}

	$smarty->assign('inc_navi',fetch_inc_navi($type, $target_c_member_id));

	$smarty->assign("type",$type);

	$page += $direc;
	$page_size = 30;

	$target_member = db_common_c_member4c_member_id($target_c_member_id);
	$smarty->assign("target_member", $target_member);
	//年月日で一覧表示、日記数に制限なし
	if ($year && $month) {
		if ($day) {
			$list_set = p_fh_diary_list_diary_list_date4c_member_id($target_c_member_id,$_REQUEST['year'], $_REQUEST['month'], $_REQUEST['day']);
			$rss_list = p_fh_diary_list_c_rss_cache_list_date($target_c_member_id,$_REQUEST['year'], $_REQUEST['month'], $_REQUEST['day']);
		} else {
			$list_set = p_fh_diary_list_diary_list_date4c_member_id($target_c_member_id,$_REQUEST['year'], $_REQUEST['month']);
			$rss_list = p_fh_diary_list_c_rss_cache_list_date($target_c_member_id,$_REQUEST['year'], $_REQUEST['month']);
		}
	} else {
		$year = date("Y");
		$month = date("n");
		$smarty->assign("all", 1);

		$list_set = p_fh_diary_list_diary_list4c_member_id($target_c_member_id,$page_size, $page);
		$rss_list = p_fh_diary_list_c_rss_cache_list($target_c_member_id,$page_size, $page);
	}

	$smarty->assign('c_rss_cache_list', $rss_list);

	$smarty->assign("target_diary_list", $list_set[0]);
	$smarty->assign("page",$page);
	$smarty->assign("page_size",$page_size);
	$smarty->assign("is_prev", $list_set[1]);
	$smarty->assign("is_next", $list_set[2]);

	$smarty->assign("diary_list_count",count($list_set[0]) );

	//日記一覧、カレンダー用変数
    $date_val=	array(
        'year' => $year,
        'month' => $month,
        'day' => $day,
    );
	$smarty->assign("date_val", $date_val);

	//日記のカレンダー
	$calendar = db_common_diary_monthly_calendar($year, $month, $target_c_member_id);

	$smarty->assign("calendar", $calendar['days']);
	$smarty->assign("ym", $calendar['ym']);

	//各月の日記
	$smarty->assign("date_list",p_fh_diary_list_date_list4c_member_id($target_c_member_id));

	//---- ページ表示 ----//
	$smarty->ext_display("fh_diary_list.tpl");
}
?>
