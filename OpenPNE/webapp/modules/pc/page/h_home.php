<?php
function pageAction_h_home($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));


	// 運営者からのおしらせ
	$smarty->assign("site_info", p_common_c_siteadmin4target_pagename('h_home'));

	$c_member=db_common_c_member4c_member_id($u);
	//メンバ情報
	$smarty->assign("c_member", $c_member);

	//フレンドの最新日記
	$smarty->assign("c_diary_friend_list", p_h_home_c_diary_friend_list4c_member_id($u, 5));


	//フレンドリスト
	$smarty->assign("c_friend_list", p_f_home_c_friend_list4c_member_id($u, 9));
	$smarty->assign("c_friend_count", p_common_count_friends4c_member_id($u));

	//参加コミュニティの新着書き込み
	$smarty->assign("c_commu_topic_comment_list", p_h_home_c_commu_topic_comment_list4c_member_id($u, 5));

	//自主コミュニティ
	$smarty->assign("c_commu_user_list", p_h_home_c_commu_list4c_member_id($u, 9));

	//参加自主コミュニティの数
	$smarty->assign("fh_com_count_user",p_common_count_c_commu4c_member_id($u));

	//会員数
	$smarty->assign("count_all_members",count_all_members());

	//shou050603
	//未読メッセージの数をお知らせ
	$smarty->assign("num_message_not_is_read",p_h_message_count_c_message_not_is_read4c_member_to_id($u));
	//日記コメントの未読の数をお知らせ
	$smarty->assign("num_diary_not_is_read",p_h_diary_count_c_diary_not_is_read4c_member_id($u));
	//日記コメントの未読の中で、読ませるものを送る
	$smarty->assign("first_diary_read",p_h_diary_c_diary_first_diary_read4c_member_id($u) );

	//コミュニティ承認を求めているメンバーリスト
	$h_confirm_list = p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($u);
	$smarty->assign("h_confirm_list", $h_confirm_list);
	//そのメンバーの人数
	$smarty->assign("num_h_confirm_list", count($h_confirm_list) );

	//shou050604
	//あなたにフレンド認証を求めているメンバーリスト
	$f_confirm_list = p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($u);
	$smarty->assign("f_confirm_list", $f_confirm_list);
	//そのメンバーの人数
	$smarty->assign("num_f_confirm_list", count($f_confirm_list) );

	//shou050630
	// あなたにコミュニティ管理者交代を希望しているメンバー
	$anatani_c_commu_admin_confirm_list = p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u);
	$smarty->assign("anatani_c_commu_admin_confirm_list",$anatani_c_commu_admin_confirm_list);
	//そのメンバーの人数
	$smarty->assign("num_anatani_c_commu_admin_confirm_list", count($anatani_c_commu_admin_confirm_list) );

	$smarty->assign("c_diary_list", p_common_c_diary_list4c_member_id($u,5) );
	$smarty->assign("c_blog_list", p_h_home_h_blog_list_friend4c_member_id($u, 5, 1) );

	//日記コメント記入履歴
	$smarty->assign("c_diary_my_comment_list", p_h_home_c_diary_my_comment_list4c_member_id($u, 5));

	$limit = 5;
	$smarty->assign('c_rss_cache_list', p_h_diary_list_friend_c_rss_cache_list($u, $limit));

	//
	$smarty->assign("c_friend_intro_list", p_h_home_c_friend_intro_list4c_member_id($u, 5));

	$smarty->assign('c_review_list', p_h_home_c_review_list4c_member_id($u));
	$smarty->assign('c_friend_review_list', p_h_home_c_friend_review_list4c_member_id($u));


	$smarty->assign("r_datetime",mktime());
	$date = array("日","月","火","水","木","金","土");
	$smarty->assign("r_datetime_date",$date[date("w")]);


	//カレンダー表示用
	if (defined("DISPLAY_SCHEDULE_HOME") && DISPLAY_SCHEDULE_HOME) {
		require_once(DOCUMENT_ROOT . '/lib/pear/Calendar/Week.php');
		$w = intval($requests['w']);
		if (empty($w)) {
			$w = 0;
		}
		$smarty->assign('w', $w);
		$time = strtotime($w . " week");
		$Week = new Calendar_Week(date('Y', $time), date('m', $time), date('d', $time), 0);
		$Week->build();
		$calendar = array();
		$dayofweek = array('日','月','火','水','木','金','土');
		$i = 0;
		while ($Day = $Week->fetch()) {
		      $y = $Day->thisYear();
		      $m = $Day->thisMonth();
		      $d = $Day->thisDay();
		      $item = array(
		      	'year'=> $y,
		      	'month'=>$m,
		        'day' => $d,
		        'dayofweek'=>$dayofweek[$i++], 
		        'now' => false,
		        'event' => p_h_home_event4c_member_id($y, $m, $d, $u),
		        'schedule' => p_h_calendar_c_schedule_list4date($y, $m, $d, $u),
		      );
		      if ($w == 0 && $d == date('d')) {
		      	$item['now'] = true;
		      }
		      
		      $calendar[] = $item;
		}
		$smarty->assign("calendar", $calendar);
	}
	
	// inc_entry_point
	$smarty->assign('inc_entry_point', fetch_inc_entry_point_h_home());

	//あしあとをつける
	p_common_do_access($u);

	//---- ページ表示 ----//
	$smarty->ext_display("h_home.tpl");
}
?>
