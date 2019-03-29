<?php
function pageAction_f_link_request($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&ksid=" . session_id());
		exit;
	}

	//ターゲット情報
	$smarty->assign("target_c_member", k_f_link_request_c_member4c_member_id($target_c_member_id));
	
	
	$smarty->ext_display("f_link_request.tpl");
	
}

