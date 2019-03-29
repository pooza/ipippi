<?php
// 書き込み管理(コミュニティ削除)


function doAction_delete_kakikomi_c_commu($requests)
{
	man_init_admin_do();
	
	db_common_delete_c_commu($requests['target_c_commu_id']);

	admin_client_redirect('delete_kakikomi', "コミュニティを削除しました");
}

