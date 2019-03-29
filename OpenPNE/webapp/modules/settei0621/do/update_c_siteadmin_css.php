<?php

function doAction_update_c_siteadmin_css($requests)
{
	man_init_admin_do();
	
	if (db_admin_c_siteadmin('inc_custom_css')) {
		//update
		db_admin_update_c_siteadmin('inc_custom_css', $requests['body']);
	} else {
		//insert
		db_admin_insert_c_siteadmin('inc_custom_css', $requests['body']);
	}
	
	admin_client_redirect('edit_c_sns_config', "カスタムCSSを変更しました");
}

?>
