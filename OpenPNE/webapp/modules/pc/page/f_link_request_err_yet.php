<?php

//---------------------------------------------------------------------------
function pageAction_f_link_request_err_yet($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("page.php?p=h_access_block");
		exit;
	}

	$smarty->assign('inc_navi',fetch_inc_navi("f",$target_c_member_id));

	$smarty->assign('target_c_member', db_common_c_member4c_member_id_LIGHT($target_c_member_id) );

	$smarty->ext_display("f_link_request_err_yet.tpl");
}
?>
