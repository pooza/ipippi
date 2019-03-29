<?php

//---------------------------------------------------------------------------
function pageAction_fh_com_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	$page = $requests['page'];
	$direc = $requests['direc'];
	// ----------

	if (is_null($target_c_member_id)) {
		$target_c_member_id = $u;
	}

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("page.php?p=h_access_block");
		exit;
	}

	// navi 振り分け用
	if($target_c_member_id == $u) {
		$type = "h";
	} else {
		$type = "f";
	}
	$smarty->assign('inc_navi',fetch_inc_navi($type, $target_c_member_id));

	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	$page_size = 50;

	$page += $direc;
	$smarty->assign("page", $page);

	list($c_commu_list, $pager) = p_fh_com_list_c_commu_list4c_member_id($target_c_member_id, $page, $page_size);

	$smarty->assign("fh_com_list_user", $c_commu_list);
	$smarty->assign("pager", $pager);

	for($i=1; $i <= $pager['total_page']; $i++){
		$page_list[] = $i;
	}
	$smarty->assign("page_list",$page_list);

	$smarty->ext_display("fh_com_list.tpl");
}

