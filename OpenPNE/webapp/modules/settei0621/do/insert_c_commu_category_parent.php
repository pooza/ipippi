<?php
// 中カテゴリ追加


function doAction_insert_c_commu_category_parent($requests)
{
	man_init_admin_do();
	
	if ($requests['name']) {
		db_admin_insert_c_commu_category_parent($requests['name'], $requests['sort_order']);

		admin_client_redirect('edit_category', "中カテゴリを追加しました");
	} else {
		admin_client_redirect('edit_category', "中カテゴリを追加できませんでした");
	}
}


