<?php
//---------------------------------------------------------------------------
/**
設定変更

[引数]
[リダイレクト先]
[リダイレクト引数]
[権限]
*/
function doAction_h_config_2($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$old_password = $request['old_password'];
	$new_password = $request['new_password'];
	$new_password2 = $request['new_password2'];
	// ----------

	$msg_list = array();
	if (!$new_password) $msg_list[] = "パスワードを入力してください";
	if (!$new_password2) $msg_list[] = "パスワード(確認)を入力してください";

	if ($new_password != $new_password2) $msg_list[] = "パスワードが一致しません";
	if (!ctype_alnum($new_password) ||
		strlen($new_password) < 6 ||
		strlen($new_password) > 12) {
		$msg_list[] = "パスワードは6～12文字の半角英数で入力してください";
	}

	if (!$msg_list && !db_common_authenticate_password($u, $old_password)) {
		$msg_list[] = "現在のパスワードが違います";
	}

	// error
	if ($msg_list) {
		$_REQUEST['msg'] = array_shift($msg_list);
		module_execute('pc', 'page', "h_config");
		exit;
	}

	do_common_update_password($u, $new_password);

	$GLOBALS['AUTH']->t_logout();
	$msg = "パスワードを変更しました。新しいパスワードで再ログインしてください。";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
}

