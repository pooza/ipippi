<?php
//----------------------------------------------------------------------------------
/**
�����������ɲ�

[����]
target_c_diary_id
body

[������쥯��]
fh_diary

[������쥯�Ȱ���]
target_c_diary_id

[����]
�����С�

*/
function doAction_fh_diary_insert_c_diary_comment($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_diary_id = $requests['target_c_diary_id'];
	$body = $requests['body'];
	// ----------

	if (is_null($body) || $body === ''){
		//msg=1 "��ʸ�����Ϥ��Ʋ�������"
		client_redirect("ktai_page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id&msg=1&$tail");
		exit();
	}

	//--- ���¥����å�
	
	$c_diary = _db_c_diary4c_diary_id($target_c_diary_id);
	$target_c_member_id = $c_diary['c_member_id'];
	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);

	//�����θ����ϰ�����
	if ($target_c_member['public_flag_diary'] == "friend" &&
		!_db_is_friend($u, $target_c_member_id) && $target_c_member_id != $u) {
	    client_redirect("page.php?p=h_access_block&".$tail);
	    exit;
	}
	
    //���������֥�å�����
	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block&".$tail);
		exit;
	}
	//---

	do_fh_diary_insert_c_diary_comment($u, $target_c_diary_id, $body);
	//���������Ȥ��񤭹��ޤ줿�Τ��������Τ�̤�ɰ����ˤ���
	p_h_diary_update_c_diary_is_checked4c_dirary_id($target_c_diary_id, "0");
	
	client_redirect("ktai_page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id&$tail");
}

?>