<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ������Ը�����������ä�

[����]
target_c_commu_admin_confirm_id

[������쥯����]
c_edit_member

[������쥯�Ȱ���]

[����]
���ߥ���ƥ�������

*/
function doAction_c_edit_member_delete_c_commu_admin_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_admin_confirm_id = $request['target_c_commu_admin_confirm_id'];
	// ----------

    //--- ���¥����å�
    //���ߥ�˥ƥ�������
    
	$c_commu_admin_confirm = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($target_c_commu_admin_confirm_id);
	$target_c_commu_id = $c_commu_admin_confirm['c_commu_id'];
	    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    //---


	do_c_edit_member_delete_c_commu_admin_confirm($target_c_commu_admin_confirm_id);

    client_redirect("page.php?p=c_edit_member&target_c_commu_id=$target_c_commu_id");
}
?>
