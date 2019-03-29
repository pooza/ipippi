<?php
// 書き込み管理(コミュニティトピック削除)


function doAction_delete_kakikomi_c_commu_topic($requests)
{
	man_init_admin_do();
	
	do_c_bbs_delete_c_commu_topic($requests['target_c_commu_topic_id']);

	admin_client_redirect('delete_kakikomi', "コミュニティトピックを削除しました");
}


