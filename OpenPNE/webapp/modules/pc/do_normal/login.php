<?php
function doNormalAction_login($requests)
{
	require_once(DOCUMENT_ROOT . '/lib/auth.inc');
	
	$GLOBALS['AUTH']->logout();
	$GLOBALS['AUTH']->start();

	if (!$GLOBALS['AUTH']->getAuth()) {
	    // ログイン失敗
	    $GLOBALS['AUTH']->t_logout();

        client_redirect('normal.php?p=tologin&error_code=login_failed');
        exit;
	}

	client_redirect('page.php?p=h_home');
}
?>