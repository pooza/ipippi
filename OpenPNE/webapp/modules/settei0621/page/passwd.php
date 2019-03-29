<?php
// パスワード再発行ページ

function pageAction_passwd(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();

	$v['SNS_NAME'] = SNS_NAME;
	$v['c_member'] = db_common_c_member4c_member_id_LIGHT($requests['target_c_member_id']);

	$smarty->assign($v);
	$smarty->ext_display("passwd.tpl");
}

