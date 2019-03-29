<?php


//---------------------------------------------------------------------------
	//	File:c_join_commu.tpl
//---------------------------------------------------------------------------
function pageAction_c_join_commu($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_commu_id = $requests['target_c_commu_id'];
		// ----------


		$status = do_common_get_c_join_status($u, $target_c_commu_id);
		switch($status){
		//承認必要なし
		case STATUS_C_JOIN_REQUEST_FREE:
			break;

		//管理者承認必要
		case STATUS_C_JOIN_REQUEST_NEED:
		    client_redirect("page.php?p=c_join_request&target_c_commu_id=$target_c_commu_id");
			exit;

		//承認待ち
		case STATUS_C_JOIN_WAIT:
		    client_redirect("page.php?p=c_join_err_wait&target_c_commu_id=$target_c_commu_id");
			exit;

		//既に参加
		case STATUS_C_JOIN_ALREADY:
		    client_redirect("page.php?p=c_join_err_already&target_c_commu_id=$target_c_commu_id");
			exit;
		}

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	$smarty->assign('c_commu', p_common_c_commu4c_commu_id($target_c_commu_id));

	$smarty->ext_display("c_join_commu.tpl");
}

