<?php
//---------------------------------------------------------------------------
/**
���С��򥳥ߥ�˥ƥ�����κ��

[����]
target_c_commu_id
target_c_member_id

[������쥯����]
c_edit_member

[������쥯�Ȱ���]

[����]
���ߥ���ƥ�������

*/
function doAction_c_edit_member_delete_c_commu_member($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $request['target_c_commu_id'];
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

    //--- ���¥����å�
    //���ߥ�˥ƥ�������
    //target���С���������(�Ἣʬ)�Ǥʤ�
    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    
    if ($target_c_member_id == $u) {
    	client_redirect("page.php?p=c_taikai_err_admin&target_c_commu_id=$target_c_commu_id");
    	exit;
    }
    //---

    
    // maruyama: 2005/04/08 ���ߥ�˥ƥ�����Ϥ��������ϴ����԰Ѿ��������
    _do_delete_c_commu_admin_confirm2($target_c_commu_id,$target_c_member_id);
    // -----
	do_c_edit_member_delete_c_commu_member($target_c_commu_id,$target_c_member_id);

    client_redirect("page.php?p=c_edit_member&target_c_commu_id=$target_c_commu_id");
}
?>
