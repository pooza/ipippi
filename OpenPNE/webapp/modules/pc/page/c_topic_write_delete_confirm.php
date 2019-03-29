<?php


function pageAction_c_topic_write_delete_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$c_commu_topic_comment_id = $requests['target_c_commu_topic_comment_id'];
		// ----------


		$c_commu_topic_comment = c_event_write_delete_confirm_c_commu_topic_comment4c_commu_topic_comment_id($c_commu_topic_comment_id);
		$c_commu_id = $c_commu_topic_comment['c_commu_id'];
		$c_commu_topic_id = $c_commu_topic_comment['c_commu_topic_id'];
		$c_commu = _db_c_commu4c_commu_id($c_commu_id);

		//--- 権限チェック
		if($c_commu_topic_comment['c_member_id']!=$u&&$c_commu['c_member_id_admin']!=$u){
	        handle_kengen_error();
		}
		//---

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$smarty->assign('c_commu_id', $c_commu_id);
		$smarty->assign('c_commu_topic_id', $c_commu_topic_id);
		$smarty->assign('c_commu_topic_comment', $c_commu_topic_comment);

		$smarty->assign("c_member", db_common_c_member4c_member_id($c_commu_topic_comment['c_member_id']));

		$smarty->ext_display('c_topic_write_delete_confirm.tpl');
}

