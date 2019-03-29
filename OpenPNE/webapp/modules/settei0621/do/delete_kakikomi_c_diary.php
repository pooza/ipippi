<?php
// 書き込み管理(日記削除)

function doAction_delete_kakikomi_c_diary($requests)
{
	man_init_admin_do();

	do_fh_diary_delete_c_diary($requests['target_c_diary_id']);

	admin_client_redirect('delete_kakikomi', "日記を削除しました");
}

