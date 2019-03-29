<?php

function pageAction_c_topic_add($smarty,$requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$c_commu_id = $requests['target_c_commu_id'];
	$title = $requests['title'];
	$body = $requests['body'];
	$event_flag = $requests['event_flag'];
	$err_msg = $requests['err_msg'];
	// ----------

	//--- 権限チェック
	//コミュニティメンバー
	if(!p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id, $u)){
		handle_kengen_error();
	}
	
	$smarty->assign('c_commu', p_common_c_commu4c_commu_id($c_commu_id));

	$smarty->ext_display("c_topic_add.tpl");
}
?>
