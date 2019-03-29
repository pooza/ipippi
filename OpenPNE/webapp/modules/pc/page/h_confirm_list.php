<?php



//---------------------------------------------------------------------------
function pageAction_h_confirm_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));


	// あなたにフレンドリンクを要請しているメンバー
	$smarty->assign("anatani_c_friend_confirm_list",
	        p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($u));

	// あなたに(の)管理コミュニティに参加を希望しているメンバー
	$smarty->assign("anatani_c_commu_member_confirm_list",
	        p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($u));

	// あなたにコミュニティ管理者交代を希望しているメンバー
	$smarty->assign("anatani_c_commu_admin_confirm_list",
	        p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u));


	// あなたがフレンドリンクを要請しているメンバー
	$smarty->assign("anataga_c_friend_confirm_list",
	        p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($u));

	// あなたがコミュニティ参加要請しているコミュニティ
	$smarty->assign("anataga_c_commu_member_confirm_list",
	        p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($u));

	// あなたがコミュニティ管理者交代を要請しているメンバー
	$smarty->assign("anataga_c_commu_admin_confirm_list",
	        p_h_confirm_list_anataga_c_commu_admin_confirm_list4c_member_id($u));


	//---- ページ表示 ----//
	$smarty->ext_display("h_confirm_list.tpl");
}

