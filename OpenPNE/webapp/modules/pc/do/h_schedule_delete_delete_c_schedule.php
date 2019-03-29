<?php
function doAction_h_schedule_delete_delete_c_schedule($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_schedule_id = $request['target_c_schedule_id'];
	// ----------

	//--- 権限チェック
	//スケジュール作成者

	$c_schedule = p_common_c_schedule4c_schedule_id($target_c_schedule_id);
	if ($c_schedule['c_member_id'] != $u) {
		exit("データはありません。");
	}
	//---


	do_h_schedule_delte_delete_c_schedule4c_schedule_id($target_c_schedule_id);
  
	client_redirect("page.php?p=h_schedule_delete_end");
}

