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
function doAction_f_link_request_insert_c_friend_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $request['target_c_member_id'];
	$body = $request['body'];
	// ----------

    //--- ���¥����å�
    //�ե��ɤǤʤ� or �ե��ɾ�ǧ��Ǥʤ�
    
    $status = db_common_friend_status($u, $target_c_member_id);
    if ($status['is_friend']) {
        client_redirect("page.php?p=f_link_request_err_already&target_c_member_id=$target_c_member_id");
        exit;
    } elseif($status['is_friend_confirm']) {
        client_redirect("page.php?p=f_link_request_err_wait&target_c_member_id=$target_c_member_id");
        exit;
    }
    
    //���������֥�å�����
	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block");
		exit;
	}
    //---

    
    $c_member_id_from	= $u;

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
		"���������ˤĤ��ơ���ǧ�Ԥ��ꥹ�Ȥ��龵ǧ�ޤ��ϵ��ݤ����򤷤Ƥ���������\n";

	do_common_send_message_syoudaku($c_member_id_from, $target_c_member_id, $subject, $body_disp);

	client_redirect("page.php?p=f_home&target_c_member_id=$target_c_member_id");
}
?>
