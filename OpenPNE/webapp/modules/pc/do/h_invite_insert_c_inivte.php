<?php
//---------------------------------------------------------------------------
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
function doAction_h_invite_insert_c_inivte($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$mail = $request['mail'];
	$message = $request['message'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---

	if (!db_common_is_mailaddress($mail)) {
		$msg = urlencode("メールアドレスを入力してください");
		client_redirect("page.php?p=h_invite&msg=$msg");
		exit;
	}

	if( p_is_sns_join4mail_address($mail) ){
		$msg = urlencode("そのアドレスは既に登録済みです");
		client_redirect("page.php?p=h_invite&msg=$msg");
		exit;
	}

	$session = md5(uniqid(rand(), 1));
	$c_member_id_invite = $u;

	if(is_ktai_mail_address($mail)) {
		//<PCKTAI
		if (defined('OPENPNE_REGIST_FROM') &&
				!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
			$msg = "携帯アドレスには招待できません";
			client_redirect("page.php?p=h_invite&msg=". urlencode($msg));
			exit;
		}
		//>

		// c_member_ktai_pre に追加
		if( do_common_c_member_ktai_pre4ktai_address($mail) ){
				do_update_c_member_ktai_pre($session, $mail, $c_member_id_invite);
		}else{
				do_insert_c_member_ktai_pre($session, $mail, $c_member_id_invite);
		}

		h_invite_insert_c_invite_mail_send($session, $c_member_id_invite, $mail, $message);

	} else {
		//<PCKTAI
		if (defined('OPENPNE_REGIST_FROM') &&
				!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
			$msg = "PCアドレスには招待できません";
			client_redirect("page.php?p=h_invite&msg=". urlencode($msg));
			exit;
		}
		//>

		// c_member_pre に追加
		if( do_common_c_member_pre4pc_address($mail) ){
			do_h_invite_update_c_inivte($c_member_id_invite,$mail,$message,$session);
		}else{
			do_h_invite_insert_c_inivte($c_member_id_invite,$mail,$message,$session);
		}

		$pc_address = $mail;

		do_h_invite_insert_c_inivte_mail_send($c_member_id_invite, $session, $message, $pc_address);
	}

	client_redirect("page.php?p=h_invite_end");
}

