<?php
function doAction_fh_diary_insert_c_diary_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_diary_id = $request['target_c_diary_id'];
	$body = $request['body'];
	// ----------

	if (is_null($body) || $body === ''){
		$msg = urlencode("�����Ȥ����Ϥ��Ƥ�������");
		client_redirect("page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id&msg=$msg");
		exit;
	}

	//--- ���¥����å�
	
	$c_diary = _db_c_diary4c_diary_id($target_c_diary_id);
	$target_c_member_id = $c_diary['c_member_id'];
	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);

	//�����θ����ϰ�����
	if ($target_c_member['public_flag_diary'] == "friend" &&
		!_db_is_friend($u, $target_c_member_id) && $target_c_member_id != $u) {
	    client_redirect("page.php?p=h_err_diary_access");
	    exit;
	}

    //���������֥�å�����
	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block");
		exit;
	}
	//---


	//���������Ƚ񤭹���
	do_fh_diary_insert_c_diary_comment($u, $target_c_diary_id, $body);
	//���������Ȥ��񤭹��ޤ줿�Τ��������Τ�̤�ɰ����ˤ���
	p_h_diary_update_c_diary_is_checked4c_dirary_id($target_c_diary_id, "0");

	client_redirect("page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id");
}
?>
