<?php
//-------------------------------------------------------------------
function doAction_c_edit_member_delete_c_commu_member($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

    //--- ���¥����å�
    //���ߥ�˥ƥ�������
    //target���С���������(�Ἣʬ)�Ǥʤ�

    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }

    if ($target_c_member_id == $u) {
    	handle_kengen_error();
    }
    //---


    do_c_edit_member_delete_c_commu_member($target_c_commu_id, $target_c_member_id);

    // maruyama: 2005/04/08 ���ߥ�˥ƥ�����Ϥ��������ϴ����԰Ѿ��������
    _do_delete_c_commu_admin_confirm2($target_c_commu_id,$target_c_member_id);
    // -----

    client_redirect("ktai_page.php?p=c_edit_member&target_c_commu_id=$target_c_commu_id&$tail");
}

?>