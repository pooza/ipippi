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
function doAction_f_link_request($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	$c_member_id_from	= $u;
	$c_member_id_to		= $target_c_member_id;

	$status = do_common_get_f_link_status($c_member_id_from,$c_member_id_to);

	switch($status){
		//�ꥯ������(��ǧ��������)
		case STATUS_F_LINK_FLAT;
			client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&$tail");
		break;
		//�ꥯ������(��󥯾�ǧ�Ԥ�)
		case STATUS_F_LINK_WAIT;
		//msg=5 "���Υե��ɤϡ����ߥ�󥯾�ǧ�Ԥ��Ǥ���"
			client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&msg=5&$tail");
		break;
		//�ꥯ������(�ե��ɥ�󥯺�)
		case STATUS_F_LINK_ALREADY;
		//msg=6 "���Υե��ɤϡ����Ǥ˥�󥯺ѤߤǤ���"
			client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&msg=6&$tail");
 		break;
	}
}

?>