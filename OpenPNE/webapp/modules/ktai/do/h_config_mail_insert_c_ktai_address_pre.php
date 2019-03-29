<?php

function doAction_h_config_mail_insert_c_ktai_address_pre($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- �ꥯ�������ѿ�
	$ktai_address = $requests['ktai_address'];
	// ----------

	//--- ���¥����å�
	//ɬ�פʤ�

	//---
	
	if(!db_common_is_mailaddress($ktai_address)){
		// �᡼�륢�ɥ쥹�����Ϥ��Ƥ�������
		client_redirect("ktai_page.php?p=h_config_mail&msg=12&$tail");
		exit;
	}

	if(!is_ktai_mail_address($ktai_address)) {
		// ���ӥ��ɥ쥹�ʳ��ϻ���Ǥ��ޤ���
        client_redirect("ktai_page.php?p=h_config_mail&msg=16&$tail");		
		exit;
	}

	if(p_is_sns_join4mail_address($ktai_address)){
	    // ���Υ��ɥ쥹�Ϥ��Ǥ���Ͽ����Ƥ��ޤ�
        client_redirect("ktai_page.php?p=h_config_mail&msg=17&$tail");
        exit;
	}

	k_do_delete_c_member_ktai_pre4ktai_address($ktai_address);
	k_do_delete_c_ktai_address_pre4ktai_address($ktai_address);

	$session = md5(uniqid(rand(), 1));
	k_do_insert_c_ktai_address_pre($u, $session, $ktai_address);
	
	do_mail_sns_change_ktai_mail_send($u, $session, $ktai_address);
	
	client_redirect("ktai_normal.php?p=send_mail_end");
}

?>