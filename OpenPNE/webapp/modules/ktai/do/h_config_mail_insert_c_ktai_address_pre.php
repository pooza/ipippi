<?php

function doAction_h_config_mail_insert_c_ktai_address_pre($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- リクエスト変数
	$ktai_address = $requests['ktai_address'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---
	
	if(!db_common_is_mailaddress($ktai_address)){
		// メールアドレスを入力してください
		client_redirect("ktai_page.php?p=h_config_mail&msg=12&$tail");
		exit;
	}

	if(!is_ktai_mail_address($ktai_address)) {
		// 携帯アドレス以外は指定できません
        client_redirect("ktai_page.php?p=h_config_mail&msg=16&$tail");		
		exit;
	}

	if(p_is_sns_join4mail_address($ktai_address)){
	    // このアドレスはすでに登録されています
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

