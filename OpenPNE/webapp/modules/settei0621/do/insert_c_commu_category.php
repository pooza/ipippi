<?php
// 小カテゴリ追加

function doAction_insert_c_commu_category($requests)
{
	man_init_admin_do();

	if ($requests['c_commu_category_parent_id'] && $requests['name']) {
		db_admin_insert_c_commu_category(
			$requests['c_commu_category_parent_id'],
			$requests['name'],
			$requests['sort_order']);

		admin_client_redirect('edit_category', "小カテゴリを追加しました");
	} else {
		admin_client_redirect('edit_category', "小カテゴリを追加できませんでした");
	}
}

