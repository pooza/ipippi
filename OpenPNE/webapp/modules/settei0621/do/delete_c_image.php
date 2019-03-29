<?php
// スキン画像更新


function doAction_delete_c_image($requests)
{
	man_init_admin_do();
	
	image_data_delete($requests['filename']);
	db_admin_delete_c_image_link4image_filename($requests['filename']);
	
	admin_client_redirect('edit_c_image', "画像を削除しました");
}

?>
