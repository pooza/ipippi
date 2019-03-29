<?php


function pageAction_c_event_add_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	//--- ���¥����å�
	//���ߥ�˥ƥ����С�
	if(!p_common_is_c_commu_member4c_commu_idAc_member_id($target_c_commu_id,$u)){

		$_REQUEST['target_c_commu_id'] = $target_c_commu_id;
		$_REQUEST['msg'] = "���٥�Ⱥ����򤪤��ʤ��ˤϥ��ߥ�˥ƥ��˻��ä���ɬ�פ�����ޤ�";
		module_execute('pc', 'page', "c_home");
		exit();

	}
	//---

	$event = p_c_event_add_confirm_event4request();
	$upfile_obj1 = $_FILES['image_filename1'];
	$upfile_obj2 = $_FILES['image_filename2'];
	$upfile_obj3 = $_FILES['image_filename3'];

	$upfile_obj11 = $_FILES['file_filename1'];
	$upfile_obj12 = $_FILES['file_filename2'];
	$upfile_obj13 = $_FILES['file_filename3'];


	// ���顼�����å�
	$err_msg = array();
	if (trim($event['title']) == '')  $err_msg[] = "�����ȥ�����Ϥ��Ƥ�������";
	if(trim($event['detail']) == '')  $err_msg[] = "�ܺ٤����Ϥ��Ƥ�������";

	if(!$event['open_date_month'] || !$event['open_date_day'] || !$event['open_date_year'])  $err_msg[] = "�������������Ϥ��Ƥ�������";
	elseif(!checkdate($event['open_date_month'],$event['open_date_day'],$event['open_date_year'])) $err_msg[] = "����������¸�ߤ��ޤ���";
	elseif(mktime (0,0,0,$event['open_date_month'],$event['open_date_day'],$event['open_date_year']) < mktime(0,0,0)) $err_msg[] = "���������ϲ��˻���Ǥ��ޤ���";

	if($event['invite_period_month'].$event['invite_period_day'].$event['invite_period_year'] != ""){
	    if(!$event['invite_period_month'] || !$event['invite_period_day'] || !$event['invite_period_year'])  $err_msg[] = "�罸���¤�¸�ߤ��ޤ���";
		elseif(!checkdate($event['invite_period_month'],$event['invite_period_day'],$event['invite_period_year'])) $err_msg[] = "�罸���¤�¸�ߤ��ޤ���";
	    elseif(mktime (0,0,0,$event['invite_period_month'],$event['invite_period_day'],$event['invite_period_year']) < mktime(0,0,0)) $err_msg[] = "�罸���¤ϲ��˻���Ǥ��ޤ���";	
	    elseif(mktime (0,0,0,$event['open_date_month'],$event['open_date_day'],$event['open_date_year'])
	    		<mktime (0,0,0,$event['invite_period_month'],$event['invite_period_day'],$event['invite_period_year'])) 
	    		$err_msg[] = "�罸���¤ϳ����������̤��˻���Ǥ��ޤ���";
	}

	if($upfile_obj1["tmp_name"] && (t_get_image_size($upfile_obj1) > 300*1024 || !t_check_image_format($upfile_obj1)))
		$err_msg[] = "����1�Υ�������300KB�����GIF��JPEG��PNG�ˤ��Ƥ�������";
	if($upfile_obj2["tmp_name"] && (t_get_image_size($upfile_obj2) > 300*1024 || !t_check_image_format($upfile_obj2)))
		$err_msg[] = "����2�Υ�������300KB�����GIF��JPEG��PNG�ˤ��Ƥ�������";
	if($upfile_obj3["tmp_name"] && (t_get_image_size($upfile_obj3) > 300*1024 || !t_check_image_format($upfile_obj3)))
		$err_msg[] = "����3�Υ�������300KB�����GIF��JPEG��PNG�ˤ��Ƥ�������";

	$names = array();
	for ($i = 1 ; $i <= 3 ; $i ++) {
		$varname = 'upfile_obj1' . $i;
		$name = $$varname;
		if ($name = $name['name']) {
			if (in_array($name, $names)) {
				$err_msg[] = "ź�եե�����Υե�����̾����ʣ���ޤ�";
				break;
			}
			$names[] = $name;
		}
	}

    if($upfile_obj11["tmp_name"] && (t_get_image_size($upfile_obj11) > 1024*1024))
    	$err_msg[] = "ź�եե�����1�Υ�������1MB����ˤ��Ƥ�������";
    if($upfile_obj12["tmp_name"] && (t_get_image_size($upfile_obj12) > 1024*1024))
    	$err_msg[] = "ź�եե�����2�Υ�������1MB����ˤ��Ƥ�������";
    if($upfile_obj13["tmp_name"] && (t_get_image_size($upfile_obj13) > 1024*1024))
    	$err_msg[] = "ź�եե�����3�Υ�������1MB����ˤ��Ƥ�������";

    if(is_dirty_file($upfile_obj11))
    	$err_msg[] = get_extension($upfile_obj11['name']) . "�ե������ź�դǤ��ޤ���";
    if(is_dirty_file($upfile_obj12))
    	$err_msg[] = get_extension($upfile_obj12['name']) . "�ե������ź�դǤ��ޤ���";
    if(is_dirty_file($upfile_obj13))
    	$err_msg[] = get_extension($upfile_obj13['name']) . "�ե������ź�դǤ��ޤ���";

	if ($err_msg) {
		$_REQUEST = $event;
		$_REQUEST['target_c_commu_id'] = $event['c_commu_id'];
		$_REQUEST['err_msg'] = $err_msg;
		module_execute('pc', 'page', "c_event_add");
		exit;
	}

	//������var/tmp�ե�����˥��ԡ�
	$sessid = session_id();
	t_image_clear_tmp($sessid);
	$tmpfile1 = t_image_save2tmp($upfile_obj1, $sessid, "e1");
	$tmpfile2 = t_image_save2tmp($upfile_obj2, $sessid, "e2");
	$tmpfile3 = t_image_save2tmp($upfile_obj3, $sessid, "e3");
	$tmpfile11 = t_image_save2tmp($upfile_obj11, $sessid, "t11");
	$tmpfile12 = t_image_save2tmp($upfile_obj12, $sessid, "t12");
	$tmpfile13 = t_image_save2tmp($upfile_obj13, $sessid, "t13");

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	$pref_list=p_regist_prof_c_profile_pref_list4null();
	$event = p_c_event_add_confirm_event4request();
	$event['open_pref_value']=$pref_list[$event['open_pref_id']];
	$event['image_filename1_tmpfile']=$tmpfile1;
	$event['image_filename2_tmpfile']=$tmpfile2;
	$event['image_filename3_tmpfile']=$tmpfile3;
	$event['file_filename1_tmpfile']=$tmpfile11;
	$event['file_filename2_tmpfile']=$tmpfile12;
	$event['file_filename3_tmpfile']=$tmpfile13;
	$event['image_filename1']=$upfile_obj1['name'];
	$event['image_filename2']=$upfile_obj2['name'];
	$event['image_filename3']=$upfile_obj3['name'];
	$event['file_filename1']=$upfile_obj11['name'];
	$event['file_filename2']=$upfile_obj12['name'];
	$event['file_filename3']=$upfile_obj13['name'];

	$smarty->assign('event', $event);
	$smarty->ext_display("c_event_add_confirm.tpl");

}
?>
