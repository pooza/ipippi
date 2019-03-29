<?php
// 一括メッセージ送信


function pageAction_send_messages(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();

	if (empty($requests['c_member_ids'])) {
		admin_client_redirect('list_c_member');
		exit;
	}
	
	$v['c_member_list'] = array();	
	foreach ($requests['c_member_ids'] as $c_member_id) {
		$v['c_member_list'][$c_member_id] = db_common_c_member4c_member_id($c_member_id, true);
	}
	
	$smarty->assign($v);
	$smarty->ext_display("send_messages.tpl");
}

?>
