<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ����åꥯ������

[����]
target_c_commu_id
body

[������쥯����]
c_home

[������쥯�Ȱ���]

[����]
�����С�

*/
function doAction_c_join_request_insert_c_commu_member_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	$body = $requests['body'];
	// ----------

	$c_member_id_from = $u;

    //--- ���¥����å�
    //���ߥ�˥ƥ����С��Ǥʤ� and ���þ�ǧ��Ǥʤ�

    $status = db_common_commu_status($u, $target_c_commu_id);
    if ($status['is_commu_member'] ||
    	$status['is_commu_member_confirm']) {
        handle_kengen_error();
    }
    //---


	if($body == null){
		//msg=1
		client_redirect("ktai_page.php?p=c_join_request&target_c_commu_id=$target_c_commu_id&msg=1&$tail");
		exit();
	}

	do_c_join_request_insert_c_commu_member_confirm($target_c_commu_id, $c_member_id_from, $body);

	//��å�����
	$c_commu		= do_common_c_commu4c_commu_id($target_c_commu_id);
	$c_member_id_to = $c_commu['c_member_id_admin'];
	$c_member_from	= db_common_c_member4c_member_id($c_member_id_from);

	$subject ="���ߥ�˥ƥ�����������å�����";
	$body_disp =
		$c_member_from['nickname']." ���󤫤� ".$c_commu['name']." ���ߥ�˥ƥ��ؤλ��ô�˾��å��������Ϥ��Ƥ��ޤ���\n".
		"\n".
		"��å�������\n".
		$body."\n".
		"\n".
		"���������ˤĤ��ơ���ǧ�Ԥ��ꥹ�Ȥ��龵ǧ�ޤ��ϵ��ݤ����򤷤Ƥ���������\n";

	do_common_send_message_syoudaku($c_member_id_from, $c_member_id_to, $subject, $body_disp);


    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
}

?>