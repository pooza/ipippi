<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ������Ը�������å���������

[����]
target_c_commu_id
target_c_member_id
body

[������쥯����]
c_edit_member

[������쥯�Ȱ���]
target_c_commu_id

[����]
���ߥ���ƥ�������

*/
function doAction_c_admin_request_insert_c_commu_admin_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $request['target_c_member_id'];
	$target_c_commu_id = $request['target_c_commu_id'];
	// ----------

    //--- ���¥����å�
    //��ʬ�����ߥ�˥ƥ�������
    //target�����ߥ�˥ƥ����С�
    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }

    $status = db_common_commu_status($target_c_member_id, $target_c_commu_id);
    if (!$status['is_commu_member']) {
        handle_kengen_error();
    }
    //---
    
    
	$target_c_commu_admin_confirm_id = do_c_admin_request_insert_c_commu_admin_confirm($target_c_commu_id,$target_c_member_id);

	//��å�����
	$c_member_id_from	= $u;
	$c_member_from		= db_common_c_member4c_member_id_LIGHT($c_member_id_from);
	$c_member_to		= $target_c_member_id;
	$c_commu			= do_common_c_commu4c_commu_id($target_c_commu_id);
	
	$subject ="���ߥ�˥ƥ������Ը���������å�����";
	$body_disp =
		$c_member_from['nickname']." ���󤫤餵�󤫤�".$c_commu['name']." ���ߥ�˥ƥ��δ����Ը����˾��å��������Ϥ��Ƥ��ޤ���\n".
		"\n".
		"���������ˤĤ��ơ���ǧ�Ԥ��ꥹ�Ȥ��龵ǧ�ޤ��ϵ��ݤ����򤷤Ƥ���������\n";
	
	do_common_send_message_syoudaku($c_member_id_from, $target_c_member_id, $subject, $body_disp);

    client_redirect("page.php?p=c_edit_member&target_c_commu_id=$target_c_commu_id");
}
?>
