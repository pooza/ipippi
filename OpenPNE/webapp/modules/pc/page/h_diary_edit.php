<?php

//---------------------------------------------------------------------------
function pageAction_h_diary_edit($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_diary_id = $requests['target_c_diary_id'];
	$subject = $requests['subject'];
	$body = $requests['body'];
	// ----------

	$c_diary = p_h_diary_edit_c_diary4c_diary_id($target_c_diary_id);
	if (!(is_null($subject) || is_null($body))) {
		$c_diary['subject'] = $subject;
		$c_diary['body'] = $body;
	}

    // target �����ꤵ��Ƥ��ʤ�
    // ��������
    if (!$target_c_diary_id) {
    	client_redirect("page.php?p=h_diary_add");
    	exit;
    }
	    
	// target ��������¸�ߤ��ʤ�
	if (!p_common_is_active_c_diary_id($target_c_diary_id) && $target_c_diary_id != null) {
		client_redirect("page.php?p=h_err_fh_diary");
		exit;
	}
	
	//--- ���¥����å�
	//�����κ�����
	if ($u != $c_diary['c_member_id']) {
		handle_kengen_error();
	}

	// �̿��ΰ���
	$smarty->assign('image_position', $c_diary['image_position']);

	//��Ͽ����Ƥ���̿�������0�Ϻ�����ʤ� 1�Ϻ������
	if( $_REQUEST['del_img'] & 0x01 == 1 )	$c_diary['image_filename_1'] = "";
	if( $_REQUEST['del_img'] & 0x02 == 1 )	$c_diary['image_filename_2'] = "";
	if( $_REQUEST['del_img'] & 0x04 == 1 )	$c_diary['image_filename_3'] = "";
	$smarty->assign('del_img',$_REQUEST['del_img']);

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	//�ץ�ե�����
	$smarty->assign("target_member", db_common_c_member4c_member_id($u));
	$smarty->assign("diary", $c_diary);

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
	$smarty->ext_display("h_diary_edit.tpl");
}
?>
