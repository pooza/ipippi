<?php

function pageAction_c_topic_delete_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- �ꥯ�������ѿ�
		$c_commu_topic_id = $requests['target_c_commu_topic_id'];
		// ----------

		$c_topic = c_topic_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
		$c_commu_id = $c_topic['c_commu_id'];

		//--- ���¥����å�
		if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$u)){
	        handle_kengen_error();
		}
		if(!_db_is_c_topic_admin($c_commu_topic_id, $u) &&
			!_db_is_c_commu_admin($c_commu_id, $u)){
	        handle_kengen_error();
		}
		//---

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$smarty->assign('c_commu_id',$c_commu_id);	
		$smarty->assign('c_commu_topic_id',$c_commu_topic_id);	
		$smarty->ext_display('c_topic_delete_confirm.tpl');	
}
?>
