<?php
/**
�ե��ɾҲ�ʸ���

[����]
target_c_member_id
body

[������쥯����]
f_home

[������쥯�Ȱ���]

[����]
�ե��ɴط��ˤ�����С�

*/
function doAction_f_intro_delete($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

    //--- ���¥����å�
    //�ե���
    
    $status = db_common_friend_status($u, $target_c_member_id);
    if (!$status['is_friend']) {
        handle_kengen_error();
    }
    //---
    
    
	do_f_intro_edit_update_c_friend($u, $target_c_member_id, "");

	client_redirect("page.php?p=f_home&target_c_member_id=$target_c_member_id");
}
?>
