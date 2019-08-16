<?php
function doNormalAction_login($requests)
{
	require_once(DOCUMENT_ROOT . '/lib/auth.inc');

	$GLOBALS['AUTH']->logout();
	$GLOBALS['AUTH']->start();

	if (db_common_authenticate_password_md5($GLOBALS['AUTH']->username, $GLOBALS['AUTH']->password)) {
		client_redirect('page.php?p=h_config_password');
		exit;
	}

	if (!$GLOBALS['AUTH']->getAuth()) {
		$GLOBALS['AUTH']->t_logout();
		client_redirect('normal.php?p=tologin&error_code=login_failed');
		exit;
	}

	client_redirect('page.php?p=h_home');
}
