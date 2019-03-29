<?php
// メッセージ一括送信


function doAction_send_messages($requests)
{
	man_init_admin_do();
	$module_name = $GLOBALS['__Framework']['current_module'];
	
	if (empty($requests['c_member_ids'])) {
		admin_client_redirect("list_c_member");
		exit;
	}
	
	if (empty($requests['subject'])) {
		module_execute($module_name, 'page', 'send_messages');
		exit;
	}
	if (empty($requests['body'])) {
		module_execute($module_name, 'page', 'send_messages');
		exit;
	}
	
	// 送信者はとりあえず1番で固定
	$c_member_id_from = 1;

	foreach ($requests['c_member_ids'] as $c_member_id) {
		do_common_send_message($c_member_id_from, $c_member_id, $requests['subject'], $requests['body']);
	}
	
	admin_client_redirect('top', "メッセージを送信しました。");
}

?>