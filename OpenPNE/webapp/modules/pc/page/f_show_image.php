<?php
function pageAction_f_show_image($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("page.php?p=h_access_block");
		exit;

	}

	$smarty->assign('inc_navi',fetch_inc_navi("f", $target_c_member_id));

	//20050830shou
	$smarty->assign("u", $u);

	//メンバー情報
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	$smarty->ext_display("f_show_image.tpl");
}

