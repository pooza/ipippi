<?php
function pageAction_c_join_request($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	//コミュニティＩＤ
	$smarty->assign("target_c_commu_id", $target_c_commu_id);
	
	$smarty->ext_display("c_join_request.tpl");
}

