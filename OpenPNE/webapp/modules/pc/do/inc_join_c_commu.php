<?php
//---------------------------------------------------------------------------
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
function doAction_inc_join_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_commu_id = $request['target_c_commu_id'];

	$status = do_common_get_c_join_status($u, $target_c_commu_id);

	switch($status){
	//��ǧɬ�פʤ�
	case STATUS_C_JOIN_REQUEST_FREE:
		do_inc_join_c_commu($target_c_commu_id, $u);
        do_inc_join_c_commu_send_mail($target_c_commu_id, $u);
	    client_redirect("page.php?p=c_join_commu_2&target_c_commu_id=$target_c_commu_id");
		break;
	
	//�����Ծ�ǧɬ��
	case STATUS_C_JOIN_REQUEST_NEED:
	    client_redirect("page.php?p=c_join_request&target_c_commu_id=$target_c_commu_id");
		break;

	//��ǧ�Ԥ�
	case STATUS_C_JOIN_WAIT:
	    client_redirect("page.php?p=c_join_err_wait&target_c_commu_id=$target_c_commu_id");
		break;

	//���˻���
	case STATUS_C_JOIN_ALREADY:
	    client_redirect("page.php?p=c_join_err_already&target_c_commu_id=$target_c_commu_id");
		break;
	}
}
?>
