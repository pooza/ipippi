<?php
//-----------------------------------------------------------------------------
/**
�������

[����]
subject
body

[������쥯��]
fh_diary_list

[������쥯�Ȱ���]
target_c_member_id

[����]
���桼����

*/
function doAction_h_diary_edit_insert_c_diary($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$subject = $requests['subject'];
	$body = $requests['body'];
	$target_c_diary_id = $requests['target_c_diary_id'];
	// ----------

	if(is_null($subject) || $subject === ''){
		//msg=2
		client_redirect("ktai_page.php?p=h_diary_edit&target_c_diary_id=$target_c_diary_id&msg=2&$tail");
		exit();
	}

	if(is_null($body) || $body === ''){
		//msg=1
		client_redirect("ktai_page.php?p=h_diary_edit&target_c_diary_id=$target_c_diary_id&msg=1&$tail");
		exit();
	}

	//--- ���¥����å�
	//ɬ�פʤ�

	//---


	$c_member_id = $u;

	if(!$target_c_diary_id){
		$update_c_diary_id = do_h_diary_edit_insert_c_diary($c_member_id, $subject, $body);
	}else{
		$update_c_diary_id = $target_c_diary_id;
	}

	/*
	 * ���Ӥ�WEB�Ǥϲ���UPLOAD�ʤ�
	 */
	do_h_diary_edit_update_c_diary($update_c_diary_id, $subject, $body);

	client_redirect("ktai_page.php?p=fh_diary_list&target_c_member_id=$c_member_id&$tail");
}

?>