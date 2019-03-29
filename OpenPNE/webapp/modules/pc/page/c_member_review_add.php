<?php

function pageAction_c_member_review_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$c_commu_id = $requests['target_c_commu_id'];
		$direc = $requests['direc'];
		$page = $requests['page'];
		// ----------
		$page_size = 30;
		$page = $page + $direc;
		$c_member_id= $u;

		//--- 権限チェック
		//コミュニティメンバ
		if(!_db_is_c_commu_member($c_commu_id, $u)){
			handle_kengen_error();
		}
		//---


		$smarty->assign('c_member', db_common_c_member4c_member_id($c_member_id));

		list($c_review_list, $is_prev, $is_next, $total_num, $start_num, $end_num) = p_fh_review_list_product_c_review_list4c_member_id($c_member_id, $page, $page_size);
		$smarty->assign('c_review_list', $c_review_list);
		$smarty->assign("is_prev", $is_prev);
		$smarty->assign("is_next", $is_next);
		$smarty->assign("page", $page);
		$smarty->assign("total_num", $total_num);
		$smarty->assign('start_num', $start_num);
		$smarty->assign('end_num', $end_num);

	    $c_commu = p_common_c_commu4c_commu_id($c_commu_id);
	    $smarty->assign('c_commu', $c_commu);


		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$smarty->ext_display('c_member_review_add.tpl');
}
?>
