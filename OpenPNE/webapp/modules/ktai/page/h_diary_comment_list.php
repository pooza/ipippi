<?php

//---------------------------------------------------------------------------
function pageAction_h_diary_comment_list($smarty,$requests) {
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	$page = $page + $direc;
	$page_size = 10;
	$smarty->assign("page_size",$page_size);

	$smarty->assign("c_diary_my_comment_list", p_h_diary_comment_list_c_diary_my_comment_list4c_member_id($u, 10));

	$smarty->ext_display("h_diary_comment_list.tpl");
}
?>
