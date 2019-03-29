<?php
function doAction_c_topic_add_insert_c_commu_topic($request) {
	$u = $GLOBALS['AUTH']->uid();

	$c_commu_id = $request['c_commu_id'];
	$title  = $request['title'];
	$image_filename1_tmpfile = $request['image_filename1_tmpfile'];
	$image_filename2_tmpfile = $request['image_filename2_tmpfile'];
	$image_filename3_tmpfile = $request['image_filename3_tmpfile'];
	$file_filename1_tmpfile = $request['file_filename1_tmpfile'];
	$file_filename2_tmpfile = $request['file_filename2_tmpfile'];
	$file_filename3_tmpfile = $request['file_filename3_tmpfile'];
	$body = $request['body'];

	//---権限チェック
	//コミュニティ参加者

	$status = db_common_commu_status($u, $c_commu_id);

	if(!$status['is_commu_member']) {
		handle_kengen_error();
	}
	//---


	$insert_c_commu_topic = array(
		"name" 			=> $title,
		"c_commu_id"		=> $c_commu_id,
		"r_datetime"		=> "now()",
		"r_date"			=> "now()",
		"c_member_id"		=> $u,
		"event_flag"		=> "0"
		);

	$c_commu_topic_id = do_c_event_add_insert_c_commu_topic($insert_c_commu_topic);
		
		
	if($image_filename1_tmpfile){
		$filename1 = image_insert_c_image4tmp("t_".$c_commu_topic_id."_1", $image_filename1_tmpfile);
	}
	if($image_filename2_tmpfile){
		$filename2 = image_insert_c_image4tmp("t_".$c_commu_topic_id."_2", $image_filename2_tmpfile);
	}
	if($image_filename3_tmpfile){
		$filename3 = image_insert_c_image4tmp("t_".$c_commu_topic_id."_3", $image_filename3_tmpfile);
	}

	$insert_c_commu_topic_comment = array(
		"c_commu_id"		=> $c_commu_id,
		"c_member_id"		=> $u,
		"body"				=> $body,
		"r_datetime"		=> "now()",
		"r_date"			=> "now()",
		"number"			=> 0,
		"c_commu_topic_id"	=> $c_commu_topic_id,
		"image_filename1"	=> $filename1,
		"image_filename2"	=> $filename2,
		"image_filename3"	=> $filename3,
		"file_filename1"	=> $request['file_filename1'],
		"file_filename2"	=> $request['file_filename2'],
		"file_filename3"	=> $request['file_filename3'],
		"image_position"	=> $request['image_position'],
		"event_flag"		=> "0"
		);
	$insert_id = do_c_event_add_insert_c_commu_topic_comment($insert_c_commu_topic_comment);

	if($file_filename1_tmpfile){
		file_upload2var($file_filename1_tmpfile, $request['file_filename1'], $insert_id);
	}
	if($file_filename2_tmpfile){
		file_upload2var($file_filename2_tmpfile, $request['file_filename2'], $insert_id);
	}
	if($file_filename3_tmpfile){
		file_upload2var($file_filename3_tmpfile, $request['file_filename3'], $insert_id);
	}
	t_image_clear_tmp(session_id());

	//お知らせメール送信(携帯へ)
	send_bbs_info_mail($insert_id, $u);
	//お知らせメール送信(PCへ)
	send_bbs_info_mail_pc($insert_id, $u);

	client_redirect("page.php?p=c_topic_list&target_c_commu_id=$c_commu_id");
}

