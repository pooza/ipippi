<?php
// 一括招待メール送信入力フォーム


function pageAction_send_invites(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();

	$v['SNS_NAME'] = SNS_NAME;
	
	$smarty->assign($v);
	$smarty->ext_display("send_invites.tpl");
}

?>