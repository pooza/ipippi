<?php
// 管理画面トップページ 認証済み

function pageAction_top(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();

	$v['SNS_NAME'] = SNS_NAME;

	$smarty->assign($v);
	$smarty->ext_display("top.tpl");
}

