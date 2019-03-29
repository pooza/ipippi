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

	// --- リクエスト変数
	$pc_address = $requests['pc_address'];
	// ----------

    //--- 権限チェック
    //必要なし

    //---

	$errors = array();
	if (!db_common_is_mailaddress($pc_address)) {
		$errors[] = "メールアドレスを正しく入力してください。";
	}
    elseif(do_common_c_member4pc_address($pc_address)) {
        $errors[] = "入力したメールアドレスは既に登録されています。";
    }
    
    if ($errors) {
        $smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
        $smarty->ext_set_call_type('ktai'); // ktai としての呼び出し
        $smarty->assign('inc_ktai_header', fetch_inc_ktai_header());
        $smarty->assign('errors', $errors);
        $smarty->ext_display('error_input.tpl');
        exit;
    }

    do_h_config_1($u, $pc_address);

    client_redirect("ktai_page.php?p=h_pc_send_confirm&$tail");    
}

?>