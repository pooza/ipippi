<?php
//---------------------------------------------------------------------------
/**
���ߥ�����Ը������
[����]
target_c_commu_admin_confirm_id

[������쥯����]
h_confirm_list

[������쥯�Ȱ���]

[����]
���ߥ�����Ը��������Ƥ�����С�

*/
function doAction_h_confirm_list_delete_c_commu_admin_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

 	
	// --- �ꥯ�������ѿ�
	$target_c_commu_admin_confirm_id = $request['target_c_commu_admin_confirm_id'];
	// ----------

    //--- ���¥����å�
    //���ߥ�˥ƥ������Ը��������Ƥ��� or ���ä���
    
    $cac = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($target_c_commu_admin_confirm_id);
    
    if ($cac['c_member_id_to'] != $u
        && $cac['c_member_id_admin'] != $u) {
        handle_kengen_error();
    }
    //---

	do_h_confirm_list_delete_c_commu_admin_confirm($target_c_commu_admin_confirm_id, $u);

    $msg = urlencode('��ǧ����������ޤ���');
    client_redirect("page.php?p=h_confirm_list&msg=$msg");
}
?>
