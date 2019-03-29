<?php
function pageAction_c_admin_request($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	//--- 権限チェック
	//コミュニティ管理者
    if (!_db_is_c_commu_admin($target_c_commu_id, $u)) {
        handle_kengen_error();
    }
    //---

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	$member = db_common_c_member_with_profile($target_c_member_id);
	$member['last_login']=p_f_home_last_login4access_date($member['access_date']);

	$smarty->assign("member", $member);
	$smarty->assign("c_commu", p_c_admin_request_c_commu4c_commu_id($target_c_commu_id));
	$smarty->ext_display("c_admin_request.tpl");
}
?>
