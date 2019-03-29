<?php

//---------------------------------------------------------------------------
function pageAction_h_com_comment_list($smarty,$requests) {
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	$page = $page + $direc;
	$page_size = 10;
	$smarty->assign("page_size",$page_size);

	$lst = k_p_h_home_c_commu_topic_comment_list4c_member_id($u,$page_size,$page);
	$smarty->assign("h_com_comment_list", $lst[0]);
	$smarty->assign("is_prev", $lst[1]);
	$smarty->assign("is_next", $lst[2]);
	$smarty->assign("total_num", $lst[3]);

	$smarty->assign("page", $page);

	$smarty->ext_display("h_com_comment_list.tpl");
}
?>
