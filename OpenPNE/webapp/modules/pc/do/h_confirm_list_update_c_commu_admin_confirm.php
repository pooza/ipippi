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
function doAction_h_confirm_list_update_c_commu_admin_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

    
	// --- �ꥯ�������ѿ�
	$target_c_commu_admin_confirm_id = $request['target_c_commu_admin_confirm_id'];
	// ----------

    //--- ���¥����å�
    //���ߥ�˥ƥ������Ը��������Ƥ�����С�
    
    $cac = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($target_c_commu_admin_confirm_id);
    
    if ($cac['c_member_id_to'] != $u) {
        handle_kengen_error();
    }
    // -----
    

	do_h_confirm_list_update_c_commu_admin($target_c_commu_admin_confirm_id, $u);

    $msg = urlencode('��ǧ����λ���ޤ���');
    client_redirect("page.php?p=h_confirm_list&msg=$msg");
}
?>
