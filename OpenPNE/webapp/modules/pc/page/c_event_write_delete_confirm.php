<?php

function pageAction_c_event_write_delete_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$c_commu_topic_comment_id = $requests['target_c_commu_topic_comment_id'];
		// ----------

		$c_commu_topic_comment = c_event_write_delete_confirm_c_commu_topic_comment4c_commu_topic_comment_id($c_commu_topic_comment_id);
		$c_commu_id = $c_commu_topic_comment['c_commu_id'];
		$c_commu_topic_id = $c_commu_topic_comment['c_commu_topic_id'];
		$c_commu = _db_c_commu4c_commu_id($c_commu_id);


		//--- 権限チェック
		if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$u)){
	        handle_kengen_error();
		}
		if($c_commu_topic_comment['c_member_id']!=$u&&$c_commu['c_member_id_admin']!=$u){
	        handle_kengen_error();
		}
		//---

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$smarty->assign('c_commu_id', $c_commu_id);
		$smarty->assign('c_commu_topic_id', $c_commu_topic_id);
		$smarty->assign('c_commu_topic_comment', $c_commu_topic_comment);

		$smarty->ext_display('c_event_write_delete_confirm.tpl');


}
?>
