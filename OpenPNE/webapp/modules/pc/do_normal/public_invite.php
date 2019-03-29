<?php
function doNormalAction_public_invite($requests)
{
	// �����ץ�����SNS�ʳ��Ǥ�̵��
	if (IS_CLOSED_SNS) {
		client_redirect_login();
		exit;
	}
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
    //>
	
	// --- �ꥯ�������ѿ�
	$pc_address = $requests['pc_address'];
	$pc_address2 = $requests['pc_address2'];
	// ----------
	
	//������Ͽ���ξ��Լԡ�c_member_id=1��
    $c_member_id_invite = 1;

    if (!db_common_is_mailaddress($pc_address)) {
    	$msg = '�᡼�륢�ɥ쥹�����������Ϥ��Ƥ���������';
    	client_redirect("normal.php?p=public_invite&msg=" . urlencode($msg));
    	exit;
    }
    if (is_ktai_mail_address($pc_address)) {
    	$msg = '���ӥ᡼�륢�ɥ쥹�����ϤǤ��ޤ���';
    	client_redirect("normal.php?p=public_invite&msg=" . urlencode($msg));
    	exit;
    }
    if ($pc_address != $pc_address2) {
    	$msg = '�᡼�륢�ɥ쥹�����פ��Ƥ��ޤ���';
    	client_redirect("normal.php?p=public_invite&msg=" . urlencode($msg));
    	exit;
    }
    if (_db_c_member_id4pc_address($pc_address)) {
        $msg = '���Υ��ɥ쥹�ϴ�����Ͽ����Ƥ��ޤ���';
        client_redirect("normal.php?p=public_invite&msg=" . urlencode($msg));
        exit;
    }
    
    $session = md5(uniqid(rand(), 1));
    
    if (do_common_c_member_pre4pc_address($pc_address)) {
        do_h_invite_update_c_inivte($c_member_id_invite, $pc_address, '', $session);
    } else {
        do_h_invite_insert_c_inivte($c_member_id_invite, $pc_address, '', $session);
    }
    
	do_h_invite_insert_c_inivte_mail_send($c_member_id_invite, $session, '', $pc_address);
	
    client_redirect("normal.php?p=public_invite_end");
}
?>