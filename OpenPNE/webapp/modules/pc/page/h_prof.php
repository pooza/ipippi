<?php



//---------------------------------------------------------------------------
function pageAction_h_prof($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_member_id = $u;

	$smarty->assign('is_h_prof', 1);
	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	
	$target_c_member = db_common_c_member_with_profile($u, 'friend');
	
	$smarty->assign("is_friend", 0);


	// --- f_home, h_prof 共通処理

	$smarty->assign("target_c_member_id",$target_c_member_id);
	$target_c_member['last_login'] = p_f_home_last_login4access_date($target_c_member['access_date']);
	if ($target_c_member['birth_year']) {
		$target_c_member['age'] = p_common_age4birth($target_c_member['birth_year'], $target_c_member['birth_month'], $target_c_member['birth_day']);
	}
	$smarty->assign("target_c_member", $target_c_member);

	$smarty->assign('c_rss_cache_list', p_f_home_c_rss_cache_list4c_member_id($target_c_member_id, 5));

	$smarty->assign("c_friend_comment_list", p_f_home_c_friend_comment4c_member_id($target_c_member_id));
	$smarty->assign("c_friend_list", p_f_home_c_friend_list4c_member_id($target_c_member_id, 9));
	$smarty->assign("c_friend_count", p_common_count_friends4c_member_id($target_c_member_id));
	$smarty->assign("c_diary_list", p_f_home_c_diary_list4c_member_id($target_c_member_id));
	$smarty->assign("user_count",p_common_count_c_commu4c_member_id($target_c_member_id));
	$smarty->assign("c_commu_list", p_f_home_c_commu_list4c_member_id($target_c_member_id, 9));
	$smarty->assign('c_review_list', p_h_home_c_review_list4c_member_id($target_c_member_id));

	// 誕生日まであと何日？
	$smarty->assign("days_birthday", db_common_count_days_birthday4c_member_id($target_c_member_id));

	// inc_entry_point
	$smarty->assign('inc_entry_point', fetch_inc_entry_point_f_home());

	$smarty->assign('profile_list', db_common_c_profile_list());

	// ---


	$smarty->ext_display("h_prof.tpl");
}

