<?php

function pageAction_c_event_mail_end($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$c_commu_topic_id = $requests['target_c_commu_topic_id'];
		// ----------

		$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
		$c_commu_id = $c_topic['c_commu_id'];

		//--- 権限チェック
		if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$u)){
			handle_kengen_error();
		}
		if(!_db_is_c_event_admin($c_commu_topic_id, $u)){
			handle_kengen_error();
		}
		//---

		$smarty->assign('c_commu', p_common_c_commu4c_commu_id($c_commu_id));

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$smarty->assign('c_commu_id', $c_commu_id);
		$smarty->ext_display('c_event_mail_end.tpl');
}

