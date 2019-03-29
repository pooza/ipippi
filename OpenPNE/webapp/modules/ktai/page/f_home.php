<?php
function pageAction_f_home($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------
    
    if ($target_c_member_id == $u) {
        client_redirect("ktai_page.php?p=h_home&ksid=" . session_id());
        exit;
    }

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&ksid=" . session_id());
		exit;
		
	}

    //管理画面HTML
    $smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('k_f_home'));
	
	//ターゲットのc_member

	$is_friend = _db_is_friend($u, $target_c_member_id);
	if ($is_friend) {
		$target_c_member = db_common_c_member_with_profile($target_c_member_id, 'friend');
	} else {
		$target_c_member = db_common_c_member_with_profile($target_c_member_id, 'public');
	}
	$target_c_member['last_login'] = p_f_home_last_login4access_date($target_c_member['access_date']);
	if ($target_c_member['birth_year']) {
		$target_c_member['age'] = p_common_age4birth($target_c_member['birth_year'], $target_c_member['birth_month'], $target_c_member['birth_day']);
	}
	$smarty->assign("target_c_member", $target_c_member);
	
	//ターゲットの最新日記５件
	$smarty->assign("c_diary_list", k_p_f_home_c_diary_list4c_member_id($target_c_member_id, 5));
	
	//フレンドランダム５人
	$smarty->assign("c_friend_list", k_p_f_home_c_friend_list_random4c_member_id($target_c_member_id, 5));
	
	//参加コミュニティ最新書き込み５件
	$smarty->assign("c_commu_list", k_p_f_home_c_commu_list_lastupdated4c_member_id($target_c_member_id, 5));
	
	//ターゲットと自分との関係
	$smarty->assign("relation", k_p_f_home_relationship4two_members($u, $target_c_member_id));

	$smarty->assign('profile_list', db_common_c_profile_list());
	
	//あしあとをつける
	k_p_etc_do_ashiato($target_c_member_id, $u);
	
	$smarty->ext_display("f_home.tpl");
}

?>