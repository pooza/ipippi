<?php
function pageAction_h_home($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	$c_member_secure = db_common_c_member_secure4c_member_id($u);

	//管理画面HTML
	$smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('k_h_home'));

	$c_member = db_common_c_member4c_member_id($u);
	//メンバ情報
	$smarty->assign('c_member', $c_member);
	//新着メッセージ数
	$smarty->assign('c_message_unread_count', k_p_h_home_c_message_received_unread_all_count4c_member_id($u));
	//フレンドの最新日記
	$smarty->assign('c_diary_friend_list', k_p_h_home_c_diary_friend_list4c_member_id($u, 5));
	//参加コミュニティリスト
	$smarty->assign('c_commu_list', k_p_h_home_c_commu_list_lastupdate4c_member_id($u, 5));
	//フレンドリスト
	$smarty->assign('c_friend_list', k_p_h_home_c_friend_list_random4c_member_id($u, 5));

	//会員数
	$smarty->assign("count_all_members",count_all_members());

	//参加コミュニティの新着書き込み
	$smarty->assign('c_commu_topic_list', p_h_home_c_commu_topic_comment_list4c_member_id($u, 5));

	$smarty->assign('SNS_NAME', SNS_NAME);

	//アクセス日時を記録
	k_p_common_do_access($u);

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

	// あなたにコミュニティ管理者交代を希望しているメンバー
	$anatani_c_commu_admin_confirm_list = p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u);
	$smarty->assign("anatani_c_commu_admin_confirm_list",$anatani_c_commu_admin_confirm_list);
	//そのメンバーの人数
	$smarty->assign("num_anatani_c_commu_admin_confirm_list", count($anatani_c_commu_admin_confirm_list) );

	//日記コメント記入履歴
	$smarty->assign("c_diary_my_comment_list", p_h_home_c_diary_my_comment_list4c_member_id($u, 5));

	$smarty->ext_display("h_home.tpl");
}

