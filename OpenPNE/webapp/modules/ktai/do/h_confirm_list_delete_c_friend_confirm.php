<?php
//-------------------------------------------------------------------------
/**
��󥯵���

[����]
target_c_friend_confirm_id

[������쥯����]
h_confirm_list

[������쥯�Ȱ���]

[����]
�������������Ƥ�����С�

*/
function doAction_h_confirm_list_delete_c_friend_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_friend_confirm_id = $requests['target_c_friend_confirm_id'];
	// ----------

	//--- ���¥����å�
	//��󥯾�ǧ������Ƥ��� or ���ä���

    $cfc = _do_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id);

    if ($cfc['c_member_id_to'] != $u
        && $cfc['c_member_id_from'] != $u) {
        handle_kengen_error();
    }
    //---

	_do_delete_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id, $u);

    //msg=4 "��ǧ����������ޤ�����"
    client_redirect("ktai_page.php?p=h_confirm_list&msg=4&$tail");
}

?>