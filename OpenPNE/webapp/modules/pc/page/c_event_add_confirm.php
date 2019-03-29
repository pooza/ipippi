<?php


function pageAction_c_event_add_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	//--- 権限チェック
	//コミュニティメンバー
	if(!p_common_is_c_commu_member4c_commu_idAc_member_id($target_c_commu_id,$u)){

		$_REQUEST['target_c_commu_id'] = $target_c_commu_id;
		$_REQUEST['msg'] = "イベント作成をおこなうにはコミュニティに参加する必要があります";
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


	// エラーチェック
	$err_msg = array();
	if (trim($event['title']) == '')  $err_msg[] = "タイトルを入力してください";
	if(trim($event['detail']) == '')  $err_msg[] = "詳細を入力してください";

	if(!$event['open_date_month'] || !$event['open_date_day'] || !$event['open_date_year'])  $err_msg[] = "開催日時を入力してください";
	elseif(!checkdate($event['open_date_month'],$event['open_date_day'],$event['open_date_year'])) $err_msg[] = "開催日時は存在しません";
	elseif(mktime (0,0,0,$event['open_date_month'],$event['open_date_day'],$event['open_date_year']) < mktime(0,0,0)) $err_msg[] = "開催日時は過去に指定できません";

	if($event['invite_period_month'].$event['invite_period_day'].$event['invite_period_year'] != ""){
	    if(!$event['invite_period_month'] || !$event['invite_period_day'] || !$event['invite_period_year'])  $err_msg[] = "募集期限は存在しません。";
		elseif(!checkdate($event['invite_period_month'],$event['invite_period_day'],$event['invite_period_year'])) $err_msg[] = "募集期限は存在しません";
	    elseif(mktime (0,0,0,$event['invite_period_month'],$event['invite_period_day'],$event['invite_period_year']) < mktime(0,0,0)) $err_msg[] = "募集期限は過去に指定できません";	
	    elseif(mktime (0,0,0,$event['open_date_month'],$event['open_date_day'],$event['open_date_year'])
	    		<mktime (0,0,0,$event['invite_period_month'],$event['invite_period_day'],$event['invite_period_year'])) 
	    		$err_msg[] = "募集期限は開催日時より未来に指定できません";
	}

	if($upfile_obj1["tmp_name"] && (t_get_image_size($upfile_obj1) > 300*1024 || !t_check_image_format($upfile_obj1)))
		$err_msg[] = "画像1のサイズは300KB以内のGIF・JPEG・PNGにしてください";
	if($upfile_obj2["tmp_name"] && (t_get_image_size($upfile_obj2) > 300*1024 || !t_check_image_format($upfile_obj2)))
		$err_msg[] = "画像2のサイズは300KB以内のGIF・JPEG・PNGにしてください";
	if($upfile_obj3["tmp_name"] && (t_get_image_size($upfile_obj3) > 300*1024 || !t_check_image_format($upfile_obj3)))
		$err_msg[] = "画像3のサイズは300KB以内のGIF・JPEG・PNGにしてください";

	$names = array();
	for ($i = 1 ; $i <= 3 ; $i ++) {
		$varname = 'upfile_obj1' . $i;
		$name = $$varname;
		if ($name = $name['name']) {
			if (in_array($name, $names)) {
				$err_msg[] = "添付ファイルのファイル名が重複します";
				break;
			}
			$names[] = $name;
		}
	}

    if($upfile_obj11["tmp_name"] && (t_get_image_size($upfile_obj11) > 1024*1024))
    	$err_msg[] = "添付ファイル1のサイズは1MB以内にしてください";
    if($upfile_obj12["tmp_name"] && (t_get_image_size($upfile_obj12) > 1024*1024))
    	$err_msg[] = "添付ファイル2のサイズは1MB以内にしてください";
    if($upfile_obj13["tmp_name"] && (t_get_image_size($upfile_obj13) > 1024*1024))
    	$err_msg[] = "添付ファイル3のサイズは1MB以内にしてください";

    if(is_dirty_file($upfile_obj11))
    	$err_msg[] = get_extension($upfile_obj11['name']) . "ファイルは添付できません";
    if(is_dirty_file($upfile_obj12))
    	$err_msg[] = get_extension($upfile_obj12['name']) . "ファイルは添付できません";
    if(is_dirty_file($upfile_obj13))
    	$err_msg[] = get_extension($upfile_obj13['name']) . "ファイルは添付できません";

	if ($err_msg) {
		$_REQUEST = $event;
		$_REQUEST['target_c_commu_id'] = $event['c_commu_id'];
		$_REQUEST['err_msg'] = $err_msg;
		module_execute('pc', 'page', "c_event_add");
		exit;
	}

	//画像をvar/tmpフォルダにコピー
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
