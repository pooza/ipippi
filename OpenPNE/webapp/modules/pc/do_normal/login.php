<?php
function doNormalAction_login($requests)
{
	require_once(DOCUMENT_ROOT . '/lib/auth.inc');

	$GLOBALS['AUTH']->logout();
	$GLOBALS['AUTH']->start();

	if (db_common_authenticate_password_md5($GLOBALS['AUTH']->username, $GLOBALS['AUTH']->password)) {
		client_redirect('normal.php?p=password_query&msg=セキュリティの低い、旧形式のパスワードをご利用のようです。変更をお願いします。');
		exit;
	}

	if (!$GLOBALS['AUTH']->getAuth()) {
		// ログイン失敗
		$GLOBALS['AUTH']->t_logout();

		client_redirect('normal.php?p=tologin&error_code=login_failed');
		exit;
	}

	client_redirect('page.php?p=h_home');
}
