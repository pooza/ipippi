<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ���ͧ�ͤ˶�����

[����]
target_c_commu_id
body
c_member_id_list

[������쥯����]
c_home

[������쥯�Ȱ���]

[����]
���ߥ�˥ƥ����С�

*/

function doAction_c_invite_insert_c_message_commu_invite($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	$body = $requests['body'];
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	if(null == $target_c_member_id){
		//msg=7 "������ͧ�ͤ����򤷤Ƥ�������"
		client_redirect("ktai_page.php?p=c_invite&target_c_commu_id=$target_c_commu_id&msg=7&$tail");
		exit();
	}

	if(null == $body){
		//msg=8 "��å����������Ϥ��Ƥ���������"
		client_redirect("ktai_page.php?p=c_invite&target_c_commu_id=$target_c_commu_id&msg=8&$tail");
		exit();
	}

    //--- ���¥����å�
    //�ե���

    $status = db_common_friend_status($u, $target_c_member_id);
    if (!$status['is_friend']) {
        handle_kengen_error();
    }
    //---


	$c_member_from = db_common_c_member4c_member_id($u);

    $subject ="���ߥ�˥ƥ����������å�����";

	//PC�Ǥ�URL����������    
    $url = ABSOLUTE_PATH."page.php?p=c_home&target_c_commu_id=$target_c_commu_id";
    $body_disp =
        $c_member_from['nickname']." ���󤫤餪�����ᥳ�ߥ�˥ƥ��Υ�å��������Ϥ��Ƥ��ޤ���\n".
        "\n".
        "��å�������\n".
        $body."\n".
        "\n".
        "���Υ��ߥ�˥ƥ���URL\n".
        "$url";

    do_common_send_message($u, $target_c_member_id, $subject, $body_disp);

	client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
}

?>