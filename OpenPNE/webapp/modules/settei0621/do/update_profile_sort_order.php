<?php

function doAction_update_profile_sort_order($requests)
{
	man_init_admin_do();

	if (is_null(db_admin_c_admin_config4name('SORT_ORDER_NICK'))) {
		db_admin_insert_c_admin_config('SORT_ORDER_NICK', $requests['sort_order_nick']);
	} else {
		db_admin_update_c_admin_config('SORT_ORDER_NICK', $requests['sort_order_nick']);
	}

	if (is_null(db_admin_c_admin_config4name('SORT_ORDER_BIRTH'))) {
		db_admin_insert_c_admin_config('SORT_ORDER_BIRTH', $requests['sort_order_birth']);
	} else {
		db_admin_update_c_admin_config('SORT_ORDER_BIRTH', $requests['sort_order_birth']);
	}

	admin_client_redirect('edit_c_profile', "並び順を変更しました。");
}

