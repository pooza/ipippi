<?php

//---------------------------------------------------------------------------
function pageAction_fh_diary($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_diary_id = $requests['target_c_diary_id'];
	$body = $requests['body'];
	// ----------

    // target が指定されていない
    if (!$target_c_diary_id) {
        client_redirect("page.php?p=h_err_fh_diary");
        exit;
    }
    // target の日記が存在しない
    if (!p_common_is_active_c_diary_id($target_c_diary_id)) {
        client_redirect("page.php?p=h_err_fh_diary");
        exit;
    }


    $target_c_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
    $target_c_member_id = $target_c_diary['c_member_id'];
    
    if ($target_c_member_id == $u) {
    	$type = 'h';
    	
		//日記を閲覧済みにする
		p_h_diary_update_c_diary_is_checked4c_dirary_id($target_c_diary_id, "1");
		
    } else {
    	$type = 'f';
    	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);

		//日記の公開範囲設定
		if (($target_c_member['public_flag_diary'] == "friend" &&
			 !_db_is_friend($u, $target_c_member_id))) {
		    client_redirect("page.php?p=h_err_diary_access");
		    exit;
		}
    	
    	// アクセスブロック
		if (p_common_is_access_block($u, $target_c_member_id)) {
			client_redirect("page.php?p=h_access_block");
			exit;
		}
		
		// あしあとをつける		
	    p_etc_do_ashiato($target_c_member_id, $u);
    }
	$smarty->assign("type", $type);
	    
	$smarty->assign('inc_navi',fetch_inc_navi($type, $target_c_member_id));

	$smarty->assign("member", db_common_c_member4c_member_id($u));

	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));
	$smarty->assign("target_diary", $target_c_diary);
	$smarty->assign("target_diary_comment_list", p_fh_diary_c_diary_comment_list4c_diary_id($target_c_diary_id));
	
	$smarty->assign("body", $body);

	//最近の日記を取得
	$list_set = p_fh_diary_list_diary_list4c_member_id($target_c_member_id, 7, 1);
	$smarty->assign("new_diary_list", $list_set[0]);

	//カレンダー関係
	//カレンダー開始用変数
	$year = intval($target_c_diary['year']);
	$month= intval($target_c_diary['month']);
	//日記一覧、カレンダー用変数
	$date_val=	array(
        'year' => $year,
        'month' => $month,
        'day' => null,
    );
	$smarty->assign("date_val", $date_val);
	
	//日記のカレンダー
	$calendar = db_common_diary_monthly_calendar($year, $month, $target_c_member_id);

	$smarty->assign("calendar", $calendar['days']);
	$smarty->assign("ym", $calendar['ym']);
	
	//各月の日記
	$smarty->assign("date_list",p_fh_diary_list_date_list4c_member_id($target_c_member_id));

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("fh_diary.tpl");
}

