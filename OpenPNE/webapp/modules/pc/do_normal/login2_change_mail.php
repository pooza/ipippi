<?php
function doNormalAction_login2_change_mail($requests)
{
	// --- リクエスト変数
	$sid = $requests['sid'];
	$password = $requests['password'];
	// ----------

	//--- 権限チェック
	//セッションが正しい
	//パスワードが正しい

	if (!do_change_mail($sid, $password)) {
		$msg = urlencode("パスワードが違います。");
		client_redirect("normal.php?p=login2&sid=$sid&msg=$msg");
		exit;
	}
	//---

	$msg = "メールアドレスが変更されました。";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
	exit;
}
