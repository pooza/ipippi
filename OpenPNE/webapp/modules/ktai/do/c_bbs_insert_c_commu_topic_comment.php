<?php
//----------------------------------------------------------------------------
/**
�����Ƚ񤭹���

[����]
target_c_commu_topic_id
body

[������쥯��]
c_bbs

[������쥯�Ȱ���]
target_c_commu_topic_id

[����]
���ߥ�˥ƥ����С�

*/
function doAction_c_bbs_insert_c_commu_topic_comment($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_topic_id = $requests['target_c_commu_topic_id'];
	$body = $requests['body'];
	// ----------

	//--- ���¥����å�
	//���ߥ�˥ƥ����ü�

    $c_commu_topic = _do_c_bbs_c_commu_topic4c_commu_topic_id($target_c_commu_topic_id);
    $c_commu_id = $c_commu_topic['c_commu_id'];

    $status = db_common_commu_status($u, $c_commu_id);
    if (!$status['is_commu_member']) {
        handle_kengen_error();
    }
	//---

	if (is_null($body) || $body === '') {  //body��̵�����Υ��顼����
	    //msg=1 "��ʸ�����Ϥ��Ƥ���������"
    	client_redirect("ktai_page.php?p=c_bbs&target_c_commu_topic_id=$target_c_commu_topic_id&msg=1&$tail#comment");
    	exit();
	}

	$insert_id = do_c_bbs_insert_c_commu_topic_comment($u, $target_c_commu_topic_id, $body);
	
	//���٥�ȤΥ��С����ɲ�
	if($requests['join_event']){
		do_c_event_add_insert_c_event_member($target_c_commu_topic_id, $u);
	}elseif($requests['cancel_event']){
		do_c_event_add_delete_c_event_member($target_c_commu_topic_id, $u);	
	}
	
	//���Τ餻�᡼������(���Ӥ�)
	send_bbs_info_mail($insert_id, $u);  
	//���Τ餻�᡼������(PC��)
	send_bbs_info_mail_pc($insert_id, $u);  


	client_redirect("ktai_page.php?p=c_bbs&target_c_commu_topic_id=$target_c_commu_topic_id&$tail");
}

?>