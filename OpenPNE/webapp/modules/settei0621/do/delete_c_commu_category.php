<?php
// 小カテゴリ削除


function doAction_delete_c_commu_category($requests)
{
	man_init_admin_do();
	
	db_admin_delete_c_commu_category($requests['c_commu_category_id']);

	admin_client_redirect('edit_category', "小カテゴリを削除しました");
}

?>