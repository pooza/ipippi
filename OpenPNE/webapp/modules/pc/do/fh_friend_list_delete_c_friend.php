<?php
//---------------------------------------------------------------------------
/**
�ե��ɥ�󥯤���

[����]
target_c_member_id

[������쥯��]
fh_friend_list

[������쥯�Ȱ���]
target_c_member_id

[����]
�ե��ɴط��ˤ�����С�

*/
function doAction_fh_friend_list_delete_c_friend($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//--- ���¥����å�
	//�ե���
	//�ե��ɤǤʤ��Ƥ��ä˱ƶ��Ϥʤ��Τǥ����å����ʤ�
	//---
    
	$ret = do_fh_friend_list_delete_c_friend($u, $target_c_member_id);

	client_redirect("page.php?p=h_manage_friend");
}
?>
