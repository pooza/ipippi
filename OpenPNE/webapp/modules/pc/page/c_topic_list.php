<?php

//---------------------------------------------------------------------------
function pageAction_c_topic_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_id = $requests['target_c_commu_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	$page_size = 20;
	$c_commu = p_common_c_commu4c_commu_id($c_commu_id);

	//コミュニティの存在の有無
	if (!$c_commu) {
		client_redirect("page.php?p=h_err_c_home");
		exit();
	}

	$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));

	$page += $direc;

	$smarty->assign("c_commu",$c_commu);
	list($result, $is_prev, $is_next, $total_num, $start_num, $end_num)
		 = p_c_topic_list_c_topic_list4target_c_commu_id($c_commu_id,$page,$page_size, $u);
	$smarty->assign("c_topic_list",$result);
	$smarty->assign("is_prev", $is_prev);
	$smarty->assign("is_next", $is_next);
	$smarty->assign("page", $page);
	$smarty->assign("total_num",$total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);

	//--- 権限チェック
	$is_c_commu_member = p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id,$u);

	if(!$is_c_commu_member && $c_commu['public_flag'] == "auth_commu_member"){

		$is_warning = true;

	}else{

		$is_warning = false;

	}
	$smarty->assign("is_warning", $is_warning);
	//---

	$smarty->assign("is_c_commu_admin", p_common_is_c_commu_admin4c_member_id($c_commu_id,$u));
	$smarty->assign("is_c_commu_member", $is_c_commu_member);

	$smarty->ext_display("c_topic_list.tpl");
}

