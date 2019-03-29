<?php
// お知らせ、利用規約、プライバシーポリシーの更新

function doAction_edit_c_admin_info($requests)
{
	man_init_admin_do();

	if (db_admin_c_siteadmin($requests['target'])) {
		//update
		db_admin_update_c_siteadmin($requests['target'], $requests['body']);
	} else {
		//insert
		db_admin_insert_c_siteadmin($requests['target'], $requests['body']);
	}

	admin_client_redirect('edit_c_admin_info', "変更しました", 'target='.$requests['target']);
}

