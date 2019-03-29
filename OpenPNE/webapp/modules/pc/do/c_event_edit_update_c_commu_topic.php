<?php
function doAction_c_event_edit_update_c_commu_topic($request) {
	$u = $GLOBALS['AUTH']->uid();

	 
	// --- �ꥯ�������ѿ�
	$c_commu_topic_id = $request['target_c_commu_topic_id'];
	// ----------
	$upfile_obj1 = $_FILES['image_filename1'];
	$upfile_obj2 = $_FILES['image_filename2'];
	$upfile_obj3 = $_FILES['image_filename3'];
	$upfile_obj11 = $_FILES['file_filename1'];
	$upfile_obj12 = $_FILES['file_filename2'];
	$upfile_obj13 = $_FILES['file_filename3'];

	$event = p_c_event_add_confirm_event4request();
	if($event['invite_period_year'].$event['invite_period_month'].$event['invite_period_day']!=""){
		$invite_period = $event['invite_period_year']."-".$event['invite_period_month']."-".$event['invite_period_day'];
	}else{
		$invite_period = "";
	}

	//--- ���¥����å�
	//���٥�ȴ����� or ���ߥ�˥ƥ�������

	if(!_db_is_c_event_admin($c_commu_topic_id,$u) &&
		!_db_is_c_commu_admin($event['c_commu_id'], $u)){
		handle_kengen_error();
		exit();
	}
	//---

	//���顼�����å�
    if (!trim($event['title']))  $err_msg[] = "�����ȥ�����Ϥ��Ƥ�������";
    if(!trim($event['detail']))  $err_msg[] = "�ܺ٤����Ϥ��Ƥ�������";

    if(!$event['open_date_month'] || !$event['open_date_day'] || !$event['open_date_year'])  $err_msg[] = "�������������Ϥ��Ƥ�������";
    elseif(!checkdate($event['open_date_month'],$event['open_date_day'],$event['open_date_year'])) $err_msg[] = "����������¸�ߤ��ޤ���";
    elseif(mktime(0,0,0,$event['open_date_month'],$event['open_date_day'],$event['open_date_year']) < mktime(0,0,0)) $err_msg[] = "���������ϲ��˻���Ǥ��ޤ���";

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
		$_REQUEST['err_msg'] = $err_msg;
		$_REQUEST['target_c_commu_topic_id'] = $c_commu_topic_id;
		module_execute('pc', 'page', "c_event_edit");
		exit;
    }


	//�������ԡ�	
	if( file_exists($upfile_obj1["tmp_name"]) ) $tmpfile1 = t_image_save2tmp($upfile_obj1, $sessid, "e1");
	if( file_exists($upfile_obj2["tmp_name"]) ) $tmpfile2 = t_image_save2tmp($upfile_obj2, $sessid, "e2");
	if( file_exists($upfile_obj3["tmp_name"]) ) $tmpfile3 = t_image_save2tmp($upfile_obj3, $sessid, "e3");
	if( file_exists($upfile_obj11["tmp_name"]) ) $tmpfile11 = t_image_save2tmp($upfile_obj11, $sessid, "t11");
	if( file_exists($upfile_obj12["tmp_name"]) ) $tmpfile12 = t_image_save2tmp($upfile_obj12, $sessid, "t12");
	if( file_exists($upfile_obj13["tmp_name"]) ) $tmpfile13 = t_image_save2tmp($upfile_obj13, $sessid, "t13");

	if($tmpfile1){
		$filename1 = image_insert_c_image4tmp("e_".$c_commu_topic_id."_1", $tmpfile1);		
	}
	if($tmpfile2){
		$filename2 = image_insert_c_image4tmp("e_".$c_commu_topic_id."_2", $tmpfile2);		
	}
	if($tmpfile3){
		$filename3 = image_insert_c_image4tmp("e_".$c_commu_topic_id."_3", $tmpfile3);		
	}

	t_image_clear_tmp(session_id());


	//DB��update
	$update_c_commu_topic = array(
		"name" 			=> $event['title'],
		"c_commu_id"		=> $event['c_commu_id'],
		"c_member_id"		=> $u,
		"open_date" 		=> $event['open_date_year']."-".$event['open_date_month']."-".$event['open_date_day'],
		"open_date_comment"	=> $event['open_date_comment'],
		"open_pref_id"		=> $event['open_pref_id'],
		"open_pref_comment"	=> $event['open_pref_comment'],
		"invite_period"		=> $invite_period,
		"event_flag"		=> "1"
		);

	do_c_event_edit_update_c_commu_topic($c_commu_topic_id, $update_c_commu_topic);

	$update_c_commu_topic_comment = array(
		"c_commu_id"		=> $event['c_commu_id'],
		"c_member_id"		=> $u,
		"body"				=> $event['detail'],
		"number"			=> 0,
		"c_commu_topic_id"	=> $c_commu_topic_id,
		"event_flag"		=> "1"
		);

	$topic_comment_id = get_commu_topic_comment_id ($c_commu_topic_id);
	if($tmpfile11){
		$update_c_commu_topic_comment["file_filename1"] = $upfile_obj11['name'];
		file_upload2var($tmpfile11, $upfile_obj11['name'], $topic_comment_id);
	}
	if($tmpfile12){
		$update_c_commu_topic_comment["file_filename2"] = $upfile_obj12['name'];
		file_upload2var($tmpfile12, $upfile_obj12['name'], $topic_comment_id);
	}
	if($tmpfile13){
		$update_c_commu_topic_comment["file_filename3"] = $upfile_obj13['name'];
		file_upload2var($tmpfile13, $upfile_obj13['name'], $topic_comment_id);
	}
	t_image_clear_tmp(session_id());

	$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
	if($filename1){
		$update_c_commu_topic_comment["image_filename1"] = $filename1;
		image_data_delete($c_topic['image_filename1']);//�������
	}
	if($filename2){
		$update_c_commu_topic_comment["image_filename2"] = $filename2;
		image_data_delete($c_topic['image_filename2']);//�������
	}
	if($filename3){
		$update_c_commu_topic_comment["image_filename3"] = $filename3;
		image_data_delete($c_topic['image_filename3']);//�������
	}


	do_c_event_edit_update_c_commu_topic_comment($c_commu_topic_id,$update_c_commu_topic_comment);

	client_redirect("page.php?p=c_event_detail&target_c_commu_topic_id=".$c_commu_topic_id);

}
?>
