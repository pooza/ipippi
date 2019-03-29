<?php
// 画像削除

function doAction_delete_c_image4c_image_id($requests)
{
	man_init_admin_do();

	$c_image = db_admin_c_image4c_image_id($requests['target_c_image_id']);
	image_data_delete($c_image['filename']);
	db_admin_delete_c_image_link4image_filename($c_image['filename']);

	admin_client_redirect('list_c_image', "画像を削除しました");
}

