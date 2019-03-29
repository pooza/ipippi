<?php
//---------------------------------------------------------------------------
function doAction_h_config_ktai_send($request) {
	
	//<PCKTAI
	if (defined('OPENPNE_ENABLE_KTAI') && !OPENPNE_ENABLE_KTAI) {
		client_redirect('page.php?p=h_home');
		exit;
	}
	//>	
	
	$u = $GLOBALS['AUTH']->uid();
    
	// --- �ꥯ�������ѿ�
	$ktai_address = $request['ktai_address'];
	// ----------
    
	//--- ���¥����å�
	//ɬ�פʤ�

	//---
    
    
    if (!is_ktai_mail_address($ktai_address)) {
        $msg = urlencode("�������å��ɥ쥹�������Ƥ�������");
        client_redirect("page.php?p=h_config_ktai&msg=$msg");
        exit;
    }
    
    // ��Ͽ�Ѥߥ��ɥ쥹���ɤ��������å�����
    if (($c_member_id = do_common_c_member_id4ktai_address($ktai_address)) &&
    	$c_member_id != $u) {
        $msg = urlencode("���Ϥ��줿���ɥ쥹�ϴ�����Ͽ����Ƥ��ޤ�");
        client_redirect("page.php?p=h_config_ktai&msg=$msg");
        exit;
    }

	k_do_delete_c_member_ktai_pre4ktai_address($ktai_address);
	k_do_delete_c_ktai_address_pre4ktai_address($ktai_address);

	$session = md5(uniqid(rand(), 1));
	k_do_insert_c_ktai_address_pre($u, $session, $ktai_address);
	
	do_mail_sns_change_ktai_mail_send($u, $session, $ktai_address);    

    client_redirect("page.php?p=h_config_ktai_end");
}
?>
