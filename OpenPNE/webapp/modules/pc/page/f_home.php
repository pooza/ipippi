<?php



//---------------------------------------------------------------------------
function pageAction_f_home($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	// - IDが指定されていない場合
	// - IDが自分の場合
	// は h_home へリダイレクト
	if (!$target_c_member_id || $target_c_member_id == $u) {
		client_redirect("page.php?p=h_home");
		exit;
	}

	if (!p_common_is_active_c_member_id($target_c_member_id)){
		client_redirect("page.php?p=h_err_f_home");
		exit;
	}

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("page.php?p=h_access_block");
		exit;

	}

	//あしあとをつける
	p_etc_do_ashiato($target_c_member_id, $u);

	$smarty->assign('is_h_prof', 0);
	$smarty->assign('inc_navi',fetch_inc_navi("f",$target_c_member_id));

	$is_friend = _db_is_friend($u, $target_c_member_id);
	if ($is_friend) {
		$target_c_member = db_common_c_member_with_profile($target_c_member_id, 'friend');
		// 自分が書いた紹介文
		$smarty->assign("my_friend_intro", p_f_home_c_friend_intro($u, $target_c_member_id));
	} else {
		$target_c_member = db_common_c_member_with_profile($target_c_member_id, 'public');
		// 友達の友達
		$smarty->assign("friend_path", p_f_home_friend_path4c_member_ids($u, $target_c_member_id));
	}

	$smarty->assign("is_friend", $is_friend);
	$smarty->assign("c_member", db_common_c_member4c_member_id($u));


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


	$smarty->ext_display("f_home.tpl");
}

