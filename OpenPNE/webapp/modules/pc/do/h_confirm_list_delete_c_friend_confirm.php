<?php
//---------------------------------------------------------------------------
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
function doAction_h_confirm_list_delete_c_friend_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_friend_confirm_id = $request['target_c_friend_confirm_id'];
	// ----------

	//--- ���¥����å�
	//��󥯾�ǧ�����ä��� or ��������

    $cfc = _do_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id);
    
    if ($cfc['c_member_id_to'] != $u
        && $cfc['c_member_id_from'] != $u) {
        handle_kengen_error();
    }
    //---
    
    
	_do_delete_c_friend_confirm4c_friend_confirm_id($target_c_friend_confirm_id, $u);
    
    $msg = urlencode('��ǧ����������ޤ���');
    client_redirect("page.php?p=h_confirm_list&msg=$msg");
}
?>
