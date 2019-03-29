<?php

//---------------------------------------------------------------------------
	//	File:c_leave_commu.tpl
//---------------------------------------------------------------------------
function pageAction_c_leave_commu($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_commu_id = $requests['target_c_commu_id'];
		// ----------

		$is_admin	= do_common_is_commu_admin($target_c_commu_id, $u);
		$is_member	= do_common_is_c_commu_member($target_c_commu_id, $u);

		if($is_admin){
			client_redirect("page.php?p=c_taikai_err_admin&target_c_commu_id=$target_c_commu_id");
			return;
		}

		if(!$is_member){
			client_redirect("page.php?p=c_taikai_err_no_member&target_c_commu_id=$target_c_commu_id");
			return;
		}

		$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

		$smarty->assign('c_commu', p_common_c_commu4c_commu_id($target_c_commu_id));

		$smarty->ext_display("c_leave_commu.tpl");
}
?>
