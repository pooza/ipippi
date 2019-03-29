<?php

function doAction_c_topic_add_insert_c_commu_topic($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$c_commu_id = $requests['target_c_commu_id'];
	$title  = $requests['title'];
	$body = $requests['body'];
	// ----------

	//--- ���¥����å�
	//���ߥ�˥ƥ����ü�
	
	$status = db_common_commu_status($u, $c_commu_id);

	if(!$status['is_commu_member']) {
		handle_kengen_error();
	}	
	//---

	if (is_null($title) || $title === '') {
    	client_redirect("ktai_page.php?p=c_topic_add&target_c_commu_id=$target_c_commu_id&msg=2&$tail");
    	exit;
	}
	if (is_null($body) || $body === '') {
    	client_redirect("ktai_page.php?p=c_topic_add&target_c_commu_id=$target_c_commu_id&msg=1&$tail");
    	exit;
	}

	$insert_c_commu_topic = array(
		"name" 			=> $title,
		"c_commu_id"		=> $c_commu_id,
		"r_datetime"		=> "now()",
		"r_date"			=> "now()",
		"c_member_id"		=> $u,
		"event_flag"		=> "0"
		);

	$c_commu_topic_id = do_c_event_add_insert_c_commu_topic($insert_c_commu_topic);

	$insert_c_commu_topic_comment = array(
		"c_commu_id"		=> $c_commu_id,
		"c_member_id"		=> $u,
		"body"				=> $body,
		"r_datetime"		=> "now()",
		"r_date"			=> "now()",
		"number"			=> 0,
		"c_commu_topic_id"	=> $c_commu_topic_id,
		"event_flag"		=> "0"
		);
	$insert_id = do_c_event_add_insert_c_commu_topic_comment($insert_c_commu_topic_comment);

	//���Τ餻�᡼������(���Ӥ�)
	send_bbs_info_mail($insert_id, $u);
	//���Τ餻�᡼������(PC��)
	send_bbs_info_mail_pc($insert_id, $u);

	client_redirect("ktai_page.php?p=c_bbs&target_c_commu_topic_id=$c_commu_topic_id&$tail");
}

?>