<?php
function doAction_c_topic_write_insert_c_commu_topic_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_topic_id = $request['target_c_commu_topic_id'];
	$body = $request['body'];
	$tmpfile1 = $request['image_filename1_tmpfile'];
	$tmpfile2 = $request['image_filename2_tmpfile'];
	$tmpfile3 = $request['image_filename3_tmpfile'];
	$file_filename1_tmpfile = $request['file_filename1_tmpfile'];
	$file_filename2_tmpfile = $request['file_filename2_tmpfile'];
	$file_filename3_tmpfile = $request['file_filename3_tmpfile'];
	// ----------

	//--- 権限チェック
	//コミュニティ参加者

	$c_topic = c_topic_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
	$c_commu_id = $c_topic['c_commu_id'];

    $status = db_common_commu_status($u, $c_commu_id);
    if (!$status['is_commu_member']) {
        handle_kengen_error();
    }
    //---


	if($tmpfile1){
		$filename1 = image_insert_c_image4tmp("tw_".$c_commu_topic_id."_1", $tmpfile1);
	}
	if($tmpfile2){
		$filename2 = image_insert_c_image4tmp("tw_".$c_commu_topic_id."_2", $tmpfile2);
	}
	if($tmpfile3){
		$filename3 = image_insert_c_image4tmp("tw_".$c_commu_topic_id."_3", $tmpfile3);
	}


    $number = _do_c_commu_topic_comment_number4c_commu_topic_id($c_commu_topic_id);
	$insert_c_commu_topic_comment = array(
		"c_commu_id" 			=> $c_commu_id,
		"c_member_id" 			=> $u,
		"body" 					=> $body,
		"r_datetime" 			=> "now()",
		"r_date" 				=> "now()",
		"number" 				=> $number,
		"c_commu_topic_id" 		=> $c_commu_topic_id,
//		"is_checked" 			=> $event['title'],
		"image_filename1" 		=> $filename1,
		"image_filename2" 		=> $filename2,
		"image_filename3" 		=> $filename3,
		"file_filename1"	=> $request['file_filename1'],
		"file_filename2"	=> $request['file_filename2'],
		"file_filename3"	=> $request['file_filename3'],
		"image_position"	=> $request['image_position'],
		"event_flag" 			=> "0"
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

	client_redirect("page.php?p=c_topic_detail&target_c_commu_topic_id=".$c_commu_topic_id);
}

