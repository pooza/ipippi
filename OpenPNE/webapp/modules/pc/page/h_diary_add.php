<?php

//---------------------------------------------------------------------------
function pageAction_h_diary_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$form_val['subject'] = $requests['subject'];
	$form_val['body'] = $requests['body'];
	// ----------

	$sessid = session_id();
	t_image_clear_tmp($sessid);

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	//�ץ�ե�����
	$smarty->assign("target_member", db_common_c_member4c_member_id($u));
	$smarty->assign("form_val", $form_val);

	//���������ط�
	//���������������ѿ�
	$year = date("Y");
	$month= date("n");
	//���������������������ѿ�
	$date_val=	array(
        'year' => $year,
        'month' => $month,
        'day' => null,
    );
	$smarty->assign("date_val", $date_val);
		
	//�����Υ�������
	$calendar = db_common_diary_monthly_calendar($year, $month, $u);

	$smarty->assign("calendar", $calendar['days']);
	$smarty->assign("ym", $calendar['ym']);		

	//�Ʒ������
	$smarty->assign("date_list",p_fh_diary_list_date_list4c_member_id($u));
	
	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("h_diary_add.tpl");
}
?>
