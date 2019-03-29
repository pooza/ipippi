<?php
// プロフィール選択肢削除


function doAction_delete_c_profile_option($requests)
{
	man_init_admin_do();
	
	db_admin_delete_c_profile_option($requests['c_profile_option_id']);

	admin_client_redirect('edit_c_profile', "プロフィール選択肢を削除しました");
}

?>