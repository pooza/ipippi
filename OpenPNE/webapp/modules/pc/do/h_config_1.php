<?php
//---------------------------------------------------------------------------
/**
�����ѹ�

[����]
mail_address

[������쥯����]
h_home

[������쥯�Ȱ���]

[����]
��ʬ

*/
function doAction_h_config_1($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$pc_address = $request['pc_address'];
	$pc_address2 = $request['pc_address2'];
	// ----------

	$msg_list = array();
	if (!$pc_address)  $msg_list[] = "�᡼�륢�ɥ쥹�����Ϥ��Ƥ�������";
	if (!$pc_address2)  $msg_list[] = "�᡼�륢�ɥ쥹(��ǧ)�����Ϥ��Ƥ�������";
    if ($pc_address != $pc_address2) $msg_list[] = "�᡼�륢�ɥ쥹�����פ��ޤ���";
	if (!db_common_is_mailaddress($pc_address)) $msg_list[] = "�᡼�륢�ɥ쥹�����������Ϥ��Ƥ�������";
	
	if ($msg_list) {
		$msg = array_shift($msg_list);
		client_redirect("page.php?p=h_config&msg=".urlencode($msg));
		exit;
	}

	$c_member_id = _db_c_member_id4pc_address($pc_address);
	if( $c_member_id == $u ){
		//��ʬ�Υ᡼�륢�ɥ쥹
		$msg = urlencode("���Ϥ��줿�᡼�륢�ɥ쥹�ϴ�����Ͽ����Ƥ��ޤ���");
		client_redirect("page.php?p=h_config&msg=$msg");
		exit;
	}else if( $c_member_id ){
		//���˻Ȥ��Ƥ���
		$msg = urlencode("���Ϥ��줿�᡼�륢�ɥ쥹�ϴ�����Ͽ����Ƥ��ޤ���");
		client_redirect("page.php?p=h_config&msg=$msg");
		exit;
	}

    if (is_ktai_mail_address($pc_address)) {
        $msg = urlencode("�������å��ɥ쥹�ϵ����Ǥ��ޤ���");
        client_redirect("page.php?p=h_config&msg=$msg");
        exit;
    }

	do_h_config_1(
				$u,
				$pc_address					
	);

	$GLOBALS['AUTH']->t_logout();
	client_redirect("normal.php?p=h_config_mail");
}
?>
