<?php
//---------------------------------------------------------------------------
/**
�ե��ɾҲ�ʸ���ϡ��Խ�

[����]
target_c_member_id
body

[������쥯����]
f_home

[������쥯�Ȱ���]

[����]
�ե��ɴط��ˤ�����С�

*/
function doAction_f_intro_edit_update_c_friend($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $request['target_c_member_id'];
	$body = $request['body'];
	// ----------

    if (!$body) {
        $msg = urlencode("�Ҳ�ʸ�����Ϥ��Ƥ�������");
        client_redirect("page.php?p=f_intro_edit&target_c_member_id=$target_c_member_id&msg=$msg");
        exit();
    }

    //--- ���¥����å�
    //�ե���
    
    $status = db_common_friend_status($u, $target_c_member_id);
    if (!$status['is_friend']) {
        handle_kengen_error();
    }
    //---    
    
    
	do_f_intro_edit_update_c_friend($u, $target_c_member_id, $body);

    // �᡼������
    do_f_intro_edit_update_c_friend_send_mail($u, $target_c_member_id);

	client_redirect("page.php?p=f_home&target_c_member_id=$target_c_member_id");
}
?>
