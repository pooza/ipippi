<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ��κ��

[����]
target_c_commu_id

[������쥯����]
c_home

[������쥯�Ȱ���]

[����]
���ߥ�˥ƥ�������

*/
function doAction_c_edit_delete_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $request['target_c_commu_id'];
	// ----------

    //--- ���¥����å�
    //���ߥ�˥ƥ�������
    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    //---
    
    
	do_c_edit_delete_c_commu($target_c_commu_id);

	client_redirect("page.php?p=h_com_find_all");
}
?>
