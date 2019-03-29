<?php

function doAction_inc_page_header_logout($request) {
	$u = $GLOBALS['AUTH']->uid();

	$GLOBALS['AUTH']->t_logout();
	$msg = "ログアウトしました。";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
	exit;
}
?>
