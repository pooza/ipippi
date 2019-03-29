<?php
//shou050627
//足あとお知らせメール部分を追加
function pageAction_h_config_prof_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$prof = $_REQUEST['prof'];// do:h_config_prof で値チェック済み
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('prof', $prof);
	$smarty->assign('profile_list', db_common_c_profile_list4null());

	$smarty->ext_display("h_config_prof_confirm.tpl");
}

