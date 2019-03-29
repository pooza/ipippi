<?php
function pageAction_h_confirm_list($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	//リンク承認待ちリスト
	$smarty->assign("anatani_c_friend_confirm_list", k_p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($u));
	
	//コミュニティ参加承認待ちリスト
	$smarty->assign("anatani_c_commu_member_confirm_list", k_p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($u));
	
    // あなたにコミュニティ管理者交代を希望しているメンバー
    $smarty->assign("anatani_c_commu_admin_confirm_list",
        p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u));
    
	//リンク申請出した人のリスト
	$smarty->assign("anataga_c_friend_confirm_list", k_p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($u));
	
	//参加申請出したコミュニティに関するリスト
	$smarty->assign("anataga_c_commu_member_confirm_list", k_p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($u));

    // あなたがコミュニティ管理者交代を要請しているメンバー
    $smarty->assign("anataga_c_commu_admin_confirm_list",
        p_h_confirm_list_anataga_c_commu_admin_confirm_list4c_member_id($u));
	
	
	$smarty->ext_display("h_confirm_list.tpl");
	
}

