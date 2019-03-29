<?php
// 中カテゴリ削除

function doAction_delete_c_commu_category_parent($requests)
{
	man_init_admin_do();

	db_admin_delete_c_commu_category_parent($requests['c_commu_category_parent_id']);

	admin_client_redirect('edit_category', "中カテゴリを削除しました");
}

