<?php
function pageAction_h_config_password($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$c_member = db_common_c_member4c_member_id($u);

	$smarty->assign('c_member',$c_member);
	$smarty->assign('c_member_id_block', p_h_config_c_member_id_block4c_member_id($u));
	$smarty->assign('daily_news_day_str', str_replace(',', '・', DAILY_NEWS_DAY));
	$smarty->assign('daily_news_day_num', count(explode(',', DAILY_NEWS_DAY)));
	$smarty->assign('ABSOLUTE_PATH', ABSOLUTE_PATH);
	$smarty->assign('SNS_NAME', SNS_NAME);

	$smarty->ext_display("h_config_password.tpl");
}
