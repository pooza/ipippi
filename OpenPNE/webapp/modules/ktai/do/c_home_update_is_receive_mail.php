<?php
//-------------------------------------------------------------------
/** ���ߥ�˥ƥ��᡼��������뤫�ɤ���������
 * [����]
 * target_c_commu_id
 * 
 * [������쥯����]
 * c_home
 * 
 * [������쥯�Ȱ���]
 * target_c_commu_id
 * 
 * 
 */
function doAction_c_home_update_is_receive_mail($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	$is_receive_mail = $requests['is_receive_mail'];
	$is_receive_mail_pc = $requests['is_receive_mail_pc'];
	// ----------

	//--- ���¥����å�
	//���ߥ�˥ƥ����ü�

    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_member']) {
        handle_kengen_error();
    }
	//---


//PC&ktai��ξ������٤˹���
	do_c_home_update_is_receive_mail($target_c_commu_id, $u, $is_receive_mail, $is_receive_mail_pc);
// /shou

	client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
}

?>