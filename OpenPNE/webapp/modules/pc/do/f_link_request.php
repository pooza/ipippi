<?php
//---------------------------------------------------------------------------
/**
�ե��ɥꥯ�����Ȥ�����

[����]
target_c_member_id

[������쥯����]
f_link_request�Τɤ줫

[������쥯�Ȱ���]

[����]
�ե��ɴط���̵���桼����

*/
function doAction_f_link_request($request) {
	$u = $GLOBALS['AUTH']->uid();

 	
	// --- �ꥯ�������ѿ�
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	$c_member_id_from	= $u;
	$c_member_id_to		= $target_c_member_id;

	$status = do_common_get_f_link_status($c_member_id_from,$c_member_id_to);

	switch($status) {
	//�ꥯ������(��ǧ��������)
	case STATUS_F_LINK_FLAT;
		client_redirect("page.php?p=f_link_request&target_c_member_id=$target_c_member_id");
		break;
	//�ꥯ������(��󥯾�ǧ�Ԥ�)
	case STATUS_F_LINK_WAIT;
		client_redirect("page.php?p=f_link_request_err_wait&target_c_member_id=$target_c_member_id");
		break;
	//�ꥯ������(�ե��ɥ�󥯺�)
	case STATUS_F_LINK_ALREADY;
		client_redirect("page.php?p=f_link_request_err_already&target_c_member_id=$target_c_member_id");
		break;
	}
}
?>
