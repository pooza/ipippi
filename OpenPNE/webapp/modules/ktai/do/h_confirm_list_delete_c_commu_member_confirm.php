<?php
//---------------------------------------------------------------------
/**
���ߥ廲�õ���

[����]
target_c_commu_member_confirm_id

[������쥯����]
h_confirm_list

[������쥯�Ȱ���]

[����]
���ߥ�˥ƥ���������������Ƥ�����С�

*/
function doAction_h_confirm_list_delete_c_commu_member_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_member_confirm_id = $requests['target_c_commu_member_confirm_id'];
	// ----------

 	//--- ���¥����å�
 	//���ߥ廲�þ�ǧ������Ƥ��� or ���ä���

    $cmc = _do_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id);

    if ($cmc['c_member_id'] != $u
        && $cmc['c_member_id_admin'] != $u) {
        handle_kengen_error();
    }
    //---


    do_h_confirm_list_delete_c_commu_member_confirm($target_c_commu_member_confirm_id, $u);

    //msg=4 "��ǧ����������ޤ�����"
    client_redirect("ktai_page.php?p=h_confirm_list&msg=4&$tail");
}

?>