<?php

function doAction_update_top_banner_html($requests)
{
	man_init_admin_do();

	if ($requests['disp_type'] === "html") {
		if (db_admin_c_siteadmin('top_banner_html')) {
			db_admin_update_c_siteadmin('top_banner_html', $requests['top_banner_html']);
		} else {
			db_admin_insert_c_siteadmin('top_banner_html', $requests['top_banner_html']);
		}
	} else {
		if (db_admin_c_siteadmin('top_banner_html')) {
			db_admin_update_c_siteadmin('top_banner_html', "");
		}
	}
	
	admin_client_redirect('edit_c_banner', "トップバナーを変更しました");
}


?>
