<?php
//------------------------------------------------------------------------------
/**
���ߥ�˥ƥ��˻���

[����]
target_c_commu_id

[������쥯��]
c_home

[������쥯�Ȱ���]
target_c_commu_id

[����]
�����С�

*/
function doAction_inc_join_c_commu($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	$status = do_common_get_c_join_status($u, $target_c_commu_id);

	switch ($status) {
	//��ǧɬ�פʤ�
	case STATUS_C_JOIN_REQUEST_FREE:
		do_inc_join_c_commu($target_c_commu_id, $u);
		do_inc_join_c_commu_send_mail($target_c_commu_id, $u);
	    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
		break;

	//�����Ծ�ǧɬ��
	case STATUS_C_JOIN_REQUEST_NEED:
	    client_redirect("ktai_page.php?p=c_join_request&target_c_commu_id=$target_c_commu_id&$tail");
		break;

	//��ǧ�Ԥ�
	case STATUS_C_JOIN_WAIT:
	    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
		break;

	//���˻���
	case STATUS_C_JOIN_ALREADY:
	    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
		break;
	}
}
?>
