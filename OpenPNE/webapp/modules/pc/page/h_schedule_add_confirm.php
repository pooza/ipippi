<?php

//---------------------------------------------------------------------------
	//	File:h_schedule_add_confirm.tpl
//---------------------------------------------------------------------------
function pageAction_h_schedule_add_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- �ꥯ�������ѿ�
		$input = $requests;
		// ----------


	  $title = $input['title'];
	  $body = $input['body'];
	  
	  if (is_null($input['end_year'])) {
	    $input['end_year'] = $input['start_year'];
	  }
	  if (is_null($input['end_month'])) {
	    $input['end_month'] = $input['start_month'];
	  }
	  if (is_null($input['end_day'])) {
	    $input['end_day'] = $input['start_day'];
	  }
	  
	    // validation
	    $errors = array();
	    
	    if(!$title) {
	    	$errors[] = "�����ȥ�����Ϥ��Ƥ���������";
	    }

	    if (is_null($input['start_hour']) xor is_null($input['start_minute'])) {
	        $errors[] = "���ϻ��郎����������ޤ���";
	    }
	    if (is_null($input['end_hour']) xor is_null($input['end_minute'])) {
	        $errors[] = "��λ���郎����������ޤ���";
	    }

	    $start_date = intval(sprintf("%04d%02d%02d", $input['start_year'], $input['start_month'], $input['start_day']));
	    $end_date = intval(sprintf("%04d%02d%02d", $input['end_year'], $input['end_month'], $input['end_day']));

	    if ($input['start_hour'] && $input['start_minute']) {
	        $start_time = intval(sprintf("%02d%02d", $input['start_hour'], $input['start_minute']));
	    } else {
	        $start_time = 0; // -��
	    }
	    if ($input['end_hour'] && $input['end_minute']) {
	        $end_time = intval(sprintf("%02d%02d", $input['end_hour'], $input['end_minute']));
	    } else {
	        $end_time = 2400; // +��
	    }

	    if ($end_date < $start_date ||
	        ($end_date == $start_date && $end_time < $start_time)) {
	        $errors[] = "��λ���ϳ����������������Ǥ��ޤ���";
	    }

	    if ($errors) {
	        $_REQUEST['msg'] = array_shift($errors);
	        $i = 1;
	        while ($msg = array_shift($errors)) {
	            $_REQUEST["msg{$i}"] = $msg;
	            $i++;
	        }
	        module_execute('pc', 'page', "h_schedule_add");
	        exit;
	    }

	$smarty->assign('input', $input);

	$smarty->ext_display('h_schedule_add_confirm.tpl');
}
?>
