<?php
//---------------------------------------------------------------------------
/**
�ե��ɥꥯ�����Ȥ�����

[����]
target_c_member_id
body

[������쥯����]
f_link_request

[������쥯�Ȱ���]

[����]
�ե��ɴط���̵���桼����

*/
function doAction_f_link_request_insert_c_friend_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $requests['target_c_member_id'];
	$body = $requests['body'];
	// ----------

	$c_member_id_from	= $u;

	//--- ���¥����å�
	//�ե��ɤǤʤ� and �ե��ɾ�ǧ�Ԥ��Ǥʤ�

    $status = db_common_friend_status($u, $target_c_member_id);
    if ($status['is_friend']) {
        client_redirect("ktai_page.php?p=f_link_request_err_already&target_c_member_id=$target_c_member_id&$tail");
        exit;
    } elseif($status['is_friend_confirm']) {
        client_redirect("ktai_page.php?p=f_link_request_err_wait&target_c_member_id=$target_c_member_id&$tail");
        exit;
    }
    
    // ���������֥�å�
	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&$tail");
		exit;	
	}    
    // -----


	if($body == null){
		//msg = 1 
		client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&msg=1&$tail");
		exit();
	}

	do_f_link_request_insert_c_friend_confirm($c_member_id_from,$target_c_member_id,$body);


	//��å�����
	$c_member_to	= db_common_c_member4c_member_id($target_c_member_id);
	$c_member_from	= db_common_c_member4c_member_id($c_member_id_from);

	$subject =WORD_FRIEND."���������å�����";
	$body_disp =
		$c_member_from['nickname']." ���󤫤�".WORD_FRIEND."��������Υ�å��������Ϥ��Ƥ��ޤ���\n".
		"\n".
		"��å�������\n".
		$body."\n".
		"\n".
		"���������ˤĤ��ơ���ǧ�Ԥ��ꥹ�Ȥ��龵ǧ�ޤ��ϵ��ݤ����򤷤Ƥ���������";

	do_common_send_message_syoudaku($c_member_id_from, $target_c_member_id, $subject, $body_disp);


	client_redirect("ktai_page.php?p=f_home&target_c_member_id=$target_c_member_id&$tail");
}

?>