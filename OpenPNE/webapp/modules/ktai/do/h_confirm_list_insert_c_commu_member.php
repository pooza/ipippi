<?php
//----------------------------------------------------------------------
/**
���ߥ廲�þ�ǧ

[����]
target_c_commu_member_confirm_id

[������쥯����]
f_message_send

[������쥯�Ȱ���]

[����]
���ߥ�˥ƥ���������������Ƥ���桼����

*/
function doAction_h_confirm_list_insert_c_commu_member($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_member_confirm_id = $requests['target_c_commu_member_confirm_id'];
	// ----------
	$is_receive_mail = 0;


	//--- ���¥����å�
	//���ߥ廲�þ�ǧ������Ƥ����

    $cmc = _do_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id);

    if ($cmc['c_member_id_admin'] != $u) {
        handle_kengen_error();
    }
    //---


	do_h_confirm_list_insert_c_commu_member($target_c_commu_member_confirm_id, $u, $is_receive_mail);

    //msg=3 "��ǧ����λ���ޤ�����"
    client_redirect("ktai_page.php?p=h_confirm_list&msg=3&$tail");
}

?>