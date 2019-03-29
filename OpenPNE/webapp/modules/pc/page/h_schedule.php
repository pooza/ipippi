<?php


//---------------------------------------------------------------------------
	//	File:h_schedule.tpl
//---------------------------------------------------------------------------
function pageAction_h_schedule($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_schedule_id = $requests['target_c_schedule_id'];
		// ----------


	  $c_schedule = p_common_c_schedule4c_schedule_id($target_c_schedule_id);
	  if ($c_schedule['c_member_id'] != $u) {
	    exit("データはありません。");
	  }

	  $smarty->assign('c_schedule', $c_schedule);
	  $smarty->ext_display("h_schedule.tpl");
}

