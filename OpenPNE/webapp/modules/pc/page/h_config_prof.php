<?php



//---------------------------------------------------------------------------
function pageAction_h_config_prof($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$prof = $_REQUEST['prof'];
		// ----------

		$smarty->assign('inc_navi',fetch_inc_navi("h"));

		if (!$prof) {
			$prof = db_common_c_member_with_profile($u, 'private');
		}
		$smarty->assign('c_member', $prof);

		$smarty->assign('month', p_regist_prof_c_profile_month_list4null());
		$smarty->assign('day', p_regist_prof_c_profile_day_list4null());

		$public_flags = array(
			'public' => '全員に公開',
			'friend' => WORD_MY_FRIEND.'まで公開',
			'private'=> '公開しない',
		);
		$smarty->assign('public_flags', $public_flags);
		
		$smarty->assign('profile_list', db_common_c_profile_list());
		
		$smarty->ext_display("h_config_prof.tpl");
}
