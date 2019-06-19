<?php
//---------------------------------------------------------------------------
function doAction_h_config_ktai_send($request) {

	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$ktai_address = $request['ktai_address'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---

	if (!is_ktai_mail_address($ktai_address)) {
		$msg = urlencode("携帯電話アドレスを記入してください");
		client_redirect("page.php?p=h_config_ktai&msg=$msg");
		exit;
	}

	// 登録済みアドレスかどうかチェックする
	if (($c_member_id = do_common_c_member_id4ktai_address($ktai_address)) &&
		$c_member_id != $u) {
		$msg = urlencode("入力されたアドレスは既に登録されています");
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

