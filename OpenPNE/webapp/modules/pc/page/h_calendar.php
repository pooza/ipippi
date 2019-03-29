<?php
//---------------------------------------------------------------------------
	//	File:h_calendar.tpl
//---------------------------------------------------------------------------
function pageAction_h_calendar($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$year = $requests['year'];
		$month = $requests['month'];
		$pref_id = $requests['pref_id'];
		// ----------


	if (!$year) $year = date('Y');
	if (!$month) $month = date('n');

	if ($year == date('Y') && $month == date('n')) {
		$is_curr = true;
		$curr_day = date('d');
	}

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	// イベント
	$event_list = p_h_calendar_event4c_member_id($year, $month, $u);

	require_once(DOCUMENT_ROOT . '/lib/pear/Calendar/Month/Weekdays.php');
	$Month = new Calendar_Month_Weekdays($year, $month, 0);
	$Month->build();

	$calendar = array();
	$i = 0;
	while ($Day = $Month->fetch()) {
	    if ($Day->isFirst()) $i++;

	    if ($Day->isEmpty()) {
	        $calendar[$i][] = array();
	    } else {
	      $day = $Day->thisDay();
	      $item = array(
	        'day' => $day,
	        'now' => false,
	        'event' => $event_list[$day],
	        'schedule' => p_h_calendar_c_schedule_list4date($year, $month, $day, $u),
	      );
	      $item['day'] = $day;
	      if ($is_curr && $item['day'] == $curr_day) {
	        $item['now'] = true;
	      }
	      
	      $calendar[$i][] = $item;
	    }
	}

	$ym = array(
		'year_disp'  => $year,
		'month_disp' => $month,
		'year_prev'  => date('Y', $Month->prevMonth(true)),
		'month_prev' => date('n', $Month->prevMonth(true)),
		'year_next'  => date('Y', $Month->nextMonth(true)),
		'month_next' => date('n', $Month->nextMonth(true)),
	);
	$smarty->assign("ym", $ym);

	$smarty->assign("year", $year);
	$smarty->assign("month", $month);
	$smarty->assign("calendar", $calendar);

	$c_member = db_common_c_member4c_member_id($u);
	$smarty->assign("pref_list", p_regist_prof_c_profile_pref_list4null());
	$smarty->assign("c_member", $c_member);

	$smarty->assign("weather_url", "http://weather.yahoo.co.jp/weather/");

	$smarty->ext_display("h_calendar.tpl");
}

