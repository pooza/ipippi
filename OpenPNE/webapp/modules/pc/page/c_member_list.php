<?php



//---------------------------------------------------------------------------
function pageAction_c_member_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_commu_id = $requests['target_c_commu_id'];
		$direc = $requests['direc'];
		$page = $requests['page'];
		// ----------


	$smarty->assign("page", $page);

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));


	//メンバー情報
	$smarty->assign("member", db_common_c_member4c_member_id($u));

	//コミュニティID
	$smarty->assign("c_commu_id", $target_c_commu_id);

	//
	$smarty->assign("c_commu_num", p_c_member_list_c_commu_member_count4c_commu_id($target_c_commu_id));

	//$smarty->assign("c_commu", _db_c_commu4c_commu_id );
	$smarty->assign("c_commu", p_c_member_list_c_commu4c_commu_id($target_c_commu_id));

	$page_size = 50;

	//次ページへのインクリメント
	$page += $direc;

	//コミュニティメンバリスト
	//$list = p_c_member_list_c_members4c_commu_id($target_c_commu_id, $page_size, $page);
	list($c_member_list, $is_prev, $is_next, $total_num, $start_num, $end_num)
		= p_c_member_list_c_members4c_commu_id($target_c_commu_id, $page_size, $page);

	$smarty->assign("c_member_list", $c_member_list);
	$smarty->assign("is_prev", $is_prev);
	$smarty->assign("is_next", $is_next);
	$smarty->assign("page", $page);
	$smarty->assign("total_num",$total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);

	for($i=1;$i<=ceil($total_num / $page_size);$i++){
		$page_num[]=$i;
	}
	$smarty->assign("page_num",$page_num);


	$smarty->ext_display("c_member_list.tpl");
}

