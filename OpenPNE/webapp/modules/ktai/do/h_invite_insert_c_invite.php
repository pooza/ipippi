<?php
//-------------------------------------------------------------------
/**
招待メール送信

[引数]
mail_address
body

[リダイレクト先]
h_home

[リダイレクト引数]

[権限]
全メンバー

*/
function doAction_h_invite_insert_c_invite($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$mail = $requests['mail_address'];
	$body = $requests['body'];
	// ----------

	if (!$mail) {
		client_redirect("ktai_page.php?p=h_invite&msg=12&$tail");
		exit;
	}
	if (!$body){
		client_redirect("ktai_page.php?p=h_invite&msg=1&$tail");
		exit;
	}

	//--- 権限チェック
	//必要なし

	//---

	if (!db_common_is_mailaddress($mail)) {
        client_redirect("ktai_page.php?p=h_invite&msg=31&$tail");
        exit;
    }
	if( p_is_sns_join4mail_address($mail) ){
        client_redirect("ktai_page.php?p=h_invite&msg=9&$tail");
        exit;
	}
    

	$session = md5(uniqid(rand(), 1));

	if (is_ktai_mail_address($mail)) {
		//<PCKTAI
		if (defined('OPENPNE_REGIST_FROM') &&
				!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
			client_redirect("ktai_page.php?p=h_invite&msg=13&$tail");
			exit;
		}
		//>
	
	    // c_member_ktai_pre に追加
		if (do_common_c_member_ktai_pre4ktai_address($mail)) {
	    	do_update_c_member_ktai_pre($session, $mail, $u);
		} else {
			do_insert_c_member_ktai_pre($session, $mail, $u);
		}
		
		h_invite_insert_c_invite_mail_send($session, $u, $mail, $body);

	} else {
		//<PCKTAI
		if (defined('OPENPNE_REGIST_FROM') &&
				!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
			client_redirect("ktai_page.php?p=h_invite&msg=16&$tail");
			exit;
		}
		//>
		
		// c_member_pre に追加
		if (do_common_c_member_pre4pc_address($mail)) {
			do_h_invite_update_c_inivte($u, $mail, $body, $session);
		} else {
			do_h_invite_insert_c_inivte($u, $mail, $body, $session);
		}

		do_h_invite_insert_c_inivte_mail_send($u, $session, $body, $mail);
	}

	client_redirect("ktai_page.php?p=h_invite&msg=30&$tail");
}


