<?php
// c_sns_config 更新


function doAction_update_c_sns_config($requests)
{
	man_init_admin_do();
	
	$sets = array();
	for ($i = 0; $i <= 10; $i++) {
		$name = sprintf("border_%02d", $i);
		if ($requests[$name]) {
			$sets[$name] = $requests[$name];
		}
	}
	for ($i = 0; $i <= 10; $i++) {
		$name = sprintf("bg_%02d", $i);
		if ($requests[$name]) {
			$sets[$name] = $requests[$name];
		}
	}
	if (!$sets) {
		admin_client_redirect('edit_c_sns_config');
		exit;
	}
	
	db_admin_update_c_sns_config($sets);
	
	admin_client_redirect('edit_c_sns_config', "色を変更しました");
}


