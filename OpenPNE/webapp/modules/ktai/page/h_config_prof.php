<?php
function pageAction_h_config_prof($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	$smarty->assign("c_member", db_common_c_member4c_member_id($u));

	$prof = db_common_c_member_with_profile($u, 'private');
	$smarty->assign('c_member', $prof);

	$public_flags = array(
	'public' => '全員に公開',
	'friend' => WORD_MY_FRIEND_HALF.'まで公開',
	'private'=> '公開しない',
	);
	$smarty->assign('public_flags', $public_flags);

	$smarty->assign('profile_list', db_common_c_profile_list());

	$smarty->assign('month', p_regist_prof_c_profile_month_list4null());
	$smarty->assign('day', p_regist_prof_c_profile_day_list4null());

	$smarty->ext_display("h_config_prof.tpl");
}

