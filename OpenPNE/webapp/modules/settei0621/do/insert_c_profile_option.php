<?php
// プロフィール選択肢追加

function doAction_insert_c_profile_option($requests)
{
	man_init_admin_do();

	if ($requests['c_profile_id'] && $requests['value']) {
		db_admin_insert_c_profile_option($requests['c_profile_id'], $requests['value'], $requests['sort_order']);
	}

	admin_client_redirect('edit_c_profile', "プロフィール選択肢を追加しました");
}

