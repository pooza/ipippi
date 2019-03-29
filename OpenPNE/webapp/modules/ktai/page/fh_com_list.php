<?php
function pageAction_fh_com_list($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	if(!$target_c_member_id) $target_c_member_id = $u;

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&ksid=" . session_id());
		exit;
	}

	// メンバー情報
	$smarty->assign("target_c_member", k_p_fh_com_list_c_member4c_member_id($target_c_member_id));
	
	// 参加コミュニティリスト
	$page_size = 10;
	$page += $direc;

	$list = k_p_fh_com_list_c_commu_list4c_member_id($target_c_member_id, $page_size, $page);

	$smarty->assign("c_commu_list",$list[0]);
	$smarty->assign("page", $page);
	$smarty->assign("is_prev",$list[1]);
	$smarty->assign("is_next",$list[2]);

	// 参加コミュニティ数
	$smarty->assign("count_commus",k_p_fh_com_list_c_commu_list_count4c_member_id($target_c_member_id));

	//f or h
	$smarty->assign("INC_NAVI_type", k_p_fh_common_get_type($target_c_member_id, $u));

	$smarty->ext_display("fh_com_list.tpl");
}

