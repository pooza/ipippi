<?php
function doAction_h_schedule_add_insert_c_schedule($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$title = $request['title'];
	$body = $request['body'];
	$start_year = $request['start_year'];
	$start_month = $request['start_month'];
	$start_day = $request['start_day'];
	$start_hour = $request['start_hour'];
	$start_minute = $request['start_minute'];
	$end_year = $request['end_year'];
	$end_month = $request['end_month'];
	$end_day = $request['end_day'];
	$end_hour = $request['end_hour'];
	$end_minute = $request['end_minute'];
	$is_receive_mail = $request['is_receive_mail'];
	// ----------

	$list = array(
	  "title"=>'',
	  "body"=>'',
	  "start_year"=>null,
	  "start_month"=>null,
	  "start_day"=>null,
	  "start_hour"=>null,
	  "start_minute"=>null,
	  "end_year"=>null,
	  "end_month"=>null,
	  "end_day"=>null,
	  "end_hour"=>null,
	  "end_minute"=>null,
	  "is_receive_mail"=>0,
	);

	foreach($list as $key=>$value){
		$input[$key] = $request[$key];
	}

  $title = trim($input['title']);

  if (is_null($input['end_year'])) {
	$input['end_year'] = $input['start_year'];
  }
  if (is_null($input['end_month'])) {
	$input['end_month'] = $input['start_month'];
  }
  if (is_null($input['end_day'])) {
	$input['end_day'] = $input['start_day'];
  }

  $start_date = sprintf("%04d-%02d-%02d", $input['start_year'], $input['start_month'], $input['start_day']);
  $end_date = sprintf("%04d-%02d-%02d", $input['end_year'], $input['end_month'], $input['end_day']);

  if ( ($input['start_hour'] || $input['start_hour'] == 0)  &&  ($input['start_minute'] || $input['start_minute'] == 0)  ) {
	$start_time = "{$input['start_hour']}:{$input['start_minute']}:00";
  } else {
	$start_time = null;
  }

  if ( ($input['end_hour'] || $input['end_hour'] == 0)  &&  ($input['end_minute'] || $input['end_minute'] == 0)  ) {
	$end_time = "{$input['end_hour']}:{$input['end_minute']}:00";
  } else {
	$end_time = null;
  }
	//--- 権限チェック
	//必要なし

	//---

	do_h_schedule_add_insert_c_schedule($u, $title, $input['body'],
		$start_date, $start_time, $end_date, $end_time,
		$input['is_receive_mail']);

	client_redirect("page.php?p=h_calendar");
}

