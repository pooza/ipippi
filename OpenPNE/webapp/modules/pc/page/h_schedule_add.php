<?php


//---------------------------------------------------------------------------
	//	File:h_schedule_add.tpl
//---------------------------------------------------------------------------
function pageAction_h_schedule_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$year = $requests['year'];
		$month = $requests['month'];
		$day = $requests['day'];

		$input = $requests;
		// ----------

	if (!$year) $year = date('Y');
	if (!$month) $month = date('n');
	if (!$day) $day = date('d');

	$list = array(
	  "start_year"=>$year,
	  "start_month"=>$month,
	  "start_day"=>$day,
	  "end_year"=>$year,
	  "end_month"=>$month,
	  "end_day"=>$day,
	);
	foreach ($list as $key => $default) {
		if (is_null($input[$key])) {
			$input[$key] = $default;
		}
	}
	$smarty->assign('input', $input);

	  $year_list = array();
	  $curr_year = date('Y');
	  $year_list[$curr_year] = $curr_year;
	  $year_list[$curr_year+1] = $curr_year + 1;
	  $smarty->assign('year_list', $year_list);

	  $month_list = array();
	  for ($i=1; $i <= 12; $i++) {
	    $month_list[$i] = $i;
	  }
	  $smarty->assign('month_list', $month_list);

	  
	  $day_list = array();
	  for ($i=1; $i <= 31; $i++) {
	    $day_list[$i] = $i;
	  }
	  $smarty->assign('day_list', $day_list);

	  $hour_list = array();
	  for ($i=0; $i <= 23; $i++) {
	    $hour_list[$i] = sprintf("%02d", $i);
	  }
	  $smarty->assign('hour_list', $hour_list);

	  $minute_list = array();
	  for ($i=0; $i < 60; $i+=15) {
	    $minute_list[$i] = sprintf("%02d", $i);
	  }
	  $smarty->assign('minute_list', $minute_list);
	  
	$smarty->ext_display("h_schedule_add.tpl");
}
?>
