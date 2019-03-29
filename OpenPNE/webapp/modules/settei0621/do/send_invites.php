<?php
// 招待メール一括送信

function doAction_send_invites($requests)
{
	man_init_admin_do();
	$module_name = $GLOBALS['__Framework']['current_module'];

	if ($requests['input'] || empty($requests['mails'])) {
		module_execute($module_name, 'page', "send_invites");
		exit;
	}

	$mails = $requests['mails'];
	$mails = str_replace("\r\n", "\n", $mails);
	$mails = str_replace("\r", "\n", $mails);
	$mail_list = explode("\n", $mails);

	// filtering
	$errors = array();
	$pcs = array();
	$ktais = array();

	foreach ($mail_list as $mail) {
		// メールアドレスとして正しくない
		if (!db_common_is_mailaddress($mail)) {
			continue;
		}

		// 登録済み
		if (p_is_sns_join4mail_address($mail)){
			$errors[] = $mail;
		}
		// 携帯
		elseif (is_ktai_mail_address($mail)) {
			$ktais[] = $mail;
		}
		// PC
		else {
			$pcs[] = $mail;
		}
	}

	if (empty($requests['complete'])) {
		// 確認画面へ
		$_REQUEST['error_mails'] = $errors;
		$_REQUEST['pc_mails'] = $pcs;
		$_REQUEST['ktai_mails'] = $ktais;

		module_execute($module_name, 'page', 'send_invites_confirm');
		exit;

	} else {
		// 送信者はとりあえず1番で固定
		$c_member_id_invite = 1;

		//<PCKTAI
		if (!defined('OPENPNE_REGIST_FROM') ||
				(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1) {
			foreach ($ktais as $mail) {
				// 携帯へ招待メール
				$session = md5(uniqid(rand(), 1));

				// c_member_ktai_pre に追加
				if (do_common_c_member_ktai_pre4ktai_address($mail)) {
					do_update_c_member_ktai_pre($session, $mail, $c_member_id_invite);
				} else {
					do_insert_c_member_ktai_pre($session, $mail, $c_member_id_invite);
				}

				h_invite_insert_c_invite_mail_send($session, $c_member_id_invite, $mail, $requests['message']);
			}
		}
		//>

		//<PCKTAI
		if (!defined('OPENPNE_REGIST_FROM') ||
				(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {

			// PCへ招待メール
			foreach ($pcs as $mail) {
				$session = md5(uniqid(rand(), 1));

				// c_member_pre に追加
				if (do_common_c_member_pre4pc_address($mail)) {
					do_h_invite_update_c_inivte($c_member_id_invite,$mail,$requests['message'],$session);
				} else {
					do_h_invite_insert_c_inivte($c_member_id_invite,$mail,$requests['message'],$session);
				}

				do_h_invite_insert_c_inivte_mail_send($c_member_id_invite, $session, $requests['message'], $mail);
			}
		}
		//>

		admin_client_redirect('top', "招待メールを送信しました。");
	}
}

