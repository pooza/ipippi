<?php

function pageAction_fh_review_list_member($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$c_member_id = $requests['target_c_member_id'];
		$direc = $requests['direc'];
		$page = $requests['page'];
		// ----------

		if(p_common_is_access_block($u, $c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;
		}


		$page_size = 30;
		$page = $page + $direc;

		if(!$c_member_id){
			$c_member_id = $u;
			$type = "h";
		} elseif($c_member_id == $u) {
			$type = "h";
		} else {
			$type = "f";
		}

		$smarty->assign('c_member', db_common_c_member4c_member_id($c_member_id));

		list($c_review_list, $is_prev, $is_next, $total_num, $start_num, $end_num) 
			= p_fh_review_list_product_c_review_list4c_member_id($c_member_id, $page, $page_size);
		$smarty->assign('c_review_list', $c_review_list);
		$smarty->assign("is_prev", $is_prev);
		$smarty->assign("is_next", $is_next);
		$smarty->assign("page", $page);
		$smarty->assign("total_num", $total_num);
		$smarty->assign('start_num', $start_num);
		$smarty->assign('end_num', $end_num);
		$smarty->assign('type', $type);

		$smarty->assign('inc_navi',fetch_inc_navi($type,$c_member_id));
		$smarty->ext_display('fh_review_list_member.tpl');
}

