<?php
// 中カテゴリ編集


function doAction_update_c_commu_category_parent($requests)
{
	man_init_admin_do();
	
	if ($requests['c_commu_category_parent_id']) {
		db_admin_update_c_commu_category_parent(
			$requests['c_commu_category_parent_id'],
			$requests['name'],
			$requests['sort_order']);

		admin_client_redirect('edit_category', "中カテゴリを編集しました");
	} else {
		admin_client_redirect('edit_category', "中カテゴリを編集できませんでした");
	}
}


