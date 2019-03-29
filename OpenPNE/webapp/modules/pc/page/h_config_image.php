<?php



//---------------------------------------------------------------------------
function pageAction_h_config_image($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		$smarty->assign('inc_navi',fetch_inc_navi("h"));

		//プロフィール
		$smarty->assign("c_member", db_common_c_member4c_member_id($u));

		$smarty->ext_display("h_config_image.tpl");
}
?>
