<?php
// バナー削除


function doAction_delete_c_banner($requests)
{
	man_init_admin_do();
	
	db_admin_delete_c_banner($requests['c_banner_id']);	
	
	admin_client_redirect('edit_c_banner', "バナーを削除しました");
}

?>
