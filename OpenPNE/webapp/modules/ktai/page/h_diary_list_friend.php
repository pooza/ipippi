<?php

//---------------------------------------------------------------------------
function pageAction_h_diary_list_friend($smarty,$requests) {
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	//日記一覧
	$page = $page + $direc;
	$page_size = 10;
	$smarty->assign("page_size",$page_size);

	$lst = k_p_h_diary_list_friend_h_diary_list_friend4c_member_id($u,$page_size,$page);
	$smarty->assign("h_diary_list_friend", $lst[0]);
	$smarty->assign("is_prev", $lst[1]);
	$smarty->assign("is_next", $lst[2]);
	$smarty->assign("total_num", $lst[3]);

	$smarty->assign("page", $page);
	
	$smarty->ext_display("h_diary_list_friend.tpl");
}

