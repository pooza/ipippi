<?php
// 書き込み削除


function pageAction_delete_kakikomi(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	if ($requests['target_c_diary_id']) {
		$v['c_diary'] = _db_c_diary4c_diary_id($requests['target_c_diary_id']);
	}
	
	if ($requests['target_c_commu_id']) {
		$v['c_commu'] = _db_c_commu4c_commu_id($requests['target_c_commu_id']);
	}
	
	if ($requests['target_c_commu_topic_id']) {
		$v['c_commu_topic'] = do_common_c_commu_topic4c_commu_topic_id($requests['target_c_commu_topic_id'], -1);
	}

	$smarty->assign($v);
	$smarty->ext_display("delete_kakikomi.tpl");
}

?>