<?php
// hash_table 更新

function doAction_update_hash_table($requests)
{
	man_init_admin_do();

	$hash_tbl = AdminHashTable::singleton();
	$hash_tbl->updateTable();

	admin_client_redirect('top', "管理用ページ名を変更しました");
}

