<?php
//-------------------------------------------------------------------
function doAction_h_pc_send_insert_c_pc_address_pre($requests)
{
	//<PCKTAI
	if (defined('OPENPNE_ENABLE_PC') && !OPENPNE_ENABLE_PC) {
		client_redirect('ktai_page.php?p=h_home&' . $GLOBALS['KTAI_URL_TAIL']);
		exit;
	}
	//>
	
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$pc_address = $requests['pc_address'];
	// ----------

    //--- ���¥����å�
    //ɬ�פʤ�

    //---

	$errors = array();
	if (!db_common_is_mailaddress($pc_address)) {
		$errors[] = "�᡼�륢�ɥ쥹�����������Ϥ��Ƥ���������";
	}
    elseif(do_common_c_member4pc_address($pc_address)) {
        $errors[] = "���Ϥ����᡼�륢�ɥ쥹�ϴ�����Ͽ����Ƥ��ޤ���";
    }
    
    if ($errors) {
        $smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
        $smarty->ext_set_call_type('ktai'); // ktai �Ȥ��ƤθƤӽФ�
        $smarty->assign('inc_ktai_header', fetch_inc_ktai_header());
        $smarty->assign('errors', $errors);
        $smarty->ext_display('error_input.tpl');
        exit;
    }

    do_h_config_1($u, $pc_address);

    client_redirect("ktai_page.php?p=h_pc_send_confirm&$tail");    
}

?>