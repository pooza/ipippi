<?php
function pageAction_h_home($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));


	// ���ļԤ���Τ����餻
	$smarty->assign("site_info", p_common_c_siteadmin4target_pagename('h_home'));

	$c_member=db_common_c_member4c_member_id($u);
	//���о���
	$smarty->assign("c_member", $c_member);

	//�ե��ɤκǿ�����
	$smarty->assign("c_diary_friend_list", p_h_home_c_diary_friend_list4c_member_id($u, 5));


	//�ե��ɥꥹ��
	$smarty->assign("c_friend_list", p_f_home_c_friend_list4c_member_id($u, 9));
	$smarty->assign("c_friend_count", p_common_count_friends4c_member_id($u));

	//���å��ߥ�˥ƥ��ο���񤭹���
	$smarty->assign("c_commu_topic_comment_list", p_h_home_c_commu_topic_comment_list4c_member_id($u, 5));

	//���祳�ߥ�˥ƥ�
	$smarty->assign("c_commu_user_list", p_h_home_c_commu_list4c_member_id($u, 9));

	//���ü��祳�ߥ�˥ƥ��ο�
	$smarty->assign("fh_com_count_user",p_common_count_c_commu4c_member_id($u));

	//�����
	$smarty->assign("count_all_members",count_all_members());

	//shou050603
	//̤�ɥ�å������ο����Τ餻
	$smarty->assign("num_message_not_is_read",p_h_message_count_c_message_not_is_read4c_member_to_id($u));
	//���������Ȥ�̤�ɤο����Τ餻
	$smarty->assign("num_diary_not_is_read",p_h_diary_count_c_diary_not_is_read4c_member_id($u));
	//���������Ȥ�̤�ɤ���ǡ��ɤޤ����Τ�����
	$smarty->assign("first_diary_read",p_h_diary_c_diary_first_diary_read4c_member_id($u) );

	//���ߥ�˥ƥ���ǧ����Ƥ�����С��ꥹ��
	$h_confirm_list = p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($u);
	$smarty->assign("h_confirm_list", $h_confirm_list);
	//���Υ��С��οͿ�
	$smarty->assign("num_h_confirm_list", count($h_confirm_list) );

	//shou050604
	//���ʤ��˥ե���ǧ�ڤ���Ƥ�����С��ꥹ��
	$f_confirm_list = p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($u);
	$smarty->assign("f_confirm_list", $f_confirm_list);
	//���Υ��С��οͿ�
	$smarty->assign("num_f_confirm_list", count($f_confirm_list) );

	//shou050630
	// ���ʤ��˥��ߥ�˥ƥ������Ը�����˾���Ƥ�����С�
	$anatani_c_commu_admin_confirm_list = p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u);
	$smarty->assign("anatani_c_commu_admin_confirm_list",$anatani_c_commu_admin_confirm_list);
	//���Υ��С��οͿ�
	$smarty->assign("num_anatani_c_commu_admin_confirm_list", count($anatani_c_commu_admin_confirm_list) );

	$smarty->assign("c_diary_list", p_common_c_diary_list4c_member_id($u,5) );
	$smarty->assign("c_blog_list", p_h_home_h_blog_list_friend4c_member_id($u, 5, 1) );

	//���������ȵ�������
	$smarty->assign("c_diary_my_comment_list", p_h_home_c_diary_my_comment_list4c_member_id($u, 5));

	$limit = 5;
	$smarty->assign('c_rss_cache_list', p_h_diary_list_friend_c_rss_cache_list($u, $limit));

	//
	$smarty->assign("c_friend_intro_list", p_h_home_c_friend_intro_list4c_member_id($u, 5));

	$smarty->assign('c_review_list', p_h_home_c_review_list4c_member_id($u));
	$smarty->assign('c_friend_review_list', p_h_home_c_friend_review_list4c_member_id($u));


	$smarty->assign("r_datetime",mktime());
	$date = array("��","��","��","��","��","��","��");
	$smarty->assign("r_datetime_date",$date[date("w")]);


	//��������ɽ����
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
		$dayofweek = array('��','��','��','��','��','��','��');
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

	//�������Ȥ�Ĥ���
	p_common_do_access($u);

	//---- �ڡ���ɽ�� ----//
	$smarty->ext_display("h_home.tpl");
}
?>
