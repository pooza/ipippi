<?php

//---------------------------------------------------------------------------
function pageAction_h_message($smarty, $requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_message_id = $requests['target_c_message_id'];
	$from_h_home = $requests['from_h_home'];
	$form_val['subject'] = $requests['subject'];
	$form_val['body'] = $requests['body'];
	$box = $requests['box'];
	$jyusin_c_message_id = $requests['jyusin_c_message_id'];
	// ----------

	$form_val['target_c_message_id'] = $target_c_message_id;

	$smarty->assign('inc_navi', fetch_inc_navi("h"));

	// 既読にする
	p_h_message_update_c_message_is_read4c_message_id($target_c_message_id, $u);

	//---- 受信・送信、閲覧権限のチェック ----//
	// メッセージデータ取得
	$c_message = p_h_message_c_message4c_message_id($target_c_message_id, $u);

	if (!$form_val['subject'])
		$form_val['subject'] = "Re:".$c_message['subject'];

	//--- 権限チェック
	//メッセージ送信者 or メッセージ受信者
	if ($c_message['c_member_id_to'] != $u && $c_message['c_member_id_from'] != $u) {
		client_redirect("page.php?p=h_home");
		exit;
	}
	//---

	// is_syoudakuがあれば承認待ちリストへリダイレクト
	if ($c_message['is_syoudaku'] && $from_h_home == 1) {
		client_redirect('page.php?p=h_confirm_list');
		exit;
	}

	//---- ページ本体表示用 変数 ----//

	// メッセージデータ
	$smarty->assign("c_message", $c_message);
	$smarty->assign("form_val", $form_val);
	$smarty->assign("jyusin_c_message_id", $jyusin_c_message_id);

	//ボックス判定
	$smarty->assign("box", $box);

	//---- ページ表示 ----//
	$smarty->ext_display("h_message.tpl");
}
?>
