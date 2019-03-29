<?php


//---------------------------------------------------------------------------
	//	File:c_join_commu.tpl
//---------------------------------------------------------------------------
function pageAction_c_join_commu($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- �ꥯ�������ѿ�
		$target_c_commu_id = $requests['target_c_commu_id'];
		// ----------


		$status = do_common_get_c_join_status($u, $target_c_commu_id);
		switch($status){
		//��ǧɬ�פʤ�
		case STATUS_C_JOIN_REQUEST_FREE:
			break;

		//�����Ծ�ǧɬ��
		case STATUS_C_JOIN_REQUEST_NEED:
		    client_redirect("page.php?p=c_join_request&target_c_commu_id=$target_c_commu_id");
			exit;

		//��ǧ�Ԥ�
		case STATUS_C_JOIN_WAIT:
		    client_redirect("page.php?p=c_join_err_wait&target_c_commu_id=$target_c_commu_id");
			exit;

		//���˻���
		case STATUS_C_JOIN_ALREADY:
		    client_redirect("page.php?p=c_join_err_already&target_c_commu_id=$target_c_commu_id");
			exit;
		}

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	$smarty->assign('c_commu', p_common_c_commu4c_commu_id($target_c_commu_id));

	$smarty->ext_display("c_join_commu.tpl");
}
?>
