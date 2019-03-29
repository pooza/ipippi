<?php

require_once(DOCUMENT_ROOT . '/lib/tejimaya/TejimayaAuth.php');

define('AUTH_TABLE',"c_admin_user");
define('AUTH_USERNAMECOL',"username");
define('AUTH_PASSWORDCOL',"password");

$GLOBALS['AUTH'] = new TejimayaAuth();
$GLOBALS['AUTH']->setSessionname('OpenPNE_admin');
$GLOBALS['AUTH']->start();

// ログインページのURL
$hash_tbl =& AdminHashTable::singleton();
$p = $hash_tbl->hash('login', 'normal');
$m = $GLOBALS['__Framework']['current_module'];

$login_url = "module_normal.php?m=$m&p=$p";


if ($GLOBALS['AUTH']->getAuth()){
	$uid = db_admin_c_admin_user_id4username($GLOBALS['AUTH']->getUsername());
	if (!$uid) {
		$GLOBALS['AUTH']->logout();
		client_redirect($login_url);
		exit;		
	}
	$GLOBALS['AUTH']->uid($uid);
} else {
    // ログイン失敗の場合
    $GLOBALS['AUTH']->logout();
    if (empty($_REQUEST['username'])) {
		$msg = "ログインしてください";
    } else {
    	$msg = "ログインに失敗しました";
    }
	client_redirect($login_url . "&msg=" . urlencode($msg));
    exit;
}

?>