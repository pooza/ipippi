<?php
//---------------------------------------------------------------------------
/**
���ߥ�����Ը��徵ǧ

[����]
target_c_commu_admin_confirm_id

[������쥯����]
f_message_send

[������쥯�Ȱ���]

[����]
���ߥ�����Ը��������Ƥ�����С�

*/
function doAction_h_confirm_list_update_c_commu_admin_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_admin_confirm_id = $requests['target_c_commu_admin_confirm_id'];
	// ----------

	//--- ���¥����å�
    //���ߥ�������������Ƥ���

    $cac = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($target_c_commu_admin_confirm_id);

    if ($cac['c_member_id_to'] != $u) {
        handle_kengen_error();
    }
    //---


    do_h_confirm_list_update_c_commu_admin($target_c_commu_admin_confirm_id, $u);

    //msg=3 "��ǧ����λ���ޤ�����"
    client_redirect("ktai_page.php?p=h_confirm_list&msg=3&$tail");
}

?>