<?php
require_once(DOCUMENT_ROOT . '/lib/tejimaya/TejimayaAuth.php');

define('AUTH_TABLE',"c_member_secure");
define('AUTH_USERNAMECOL',"pc_address");
define('AUTH_PASSWORDCOL',"hashed_password");

isset($GLOBALS['__OpenPNE']['common']['session_lifetime'])
	or $GLOBALS['__OpenPNE']['common']['session_lifetime'] = 0;
isset($GLOBALS['__OpenPNE']['common']['session_idletime'])
	or $GLOBALS['__OpenPNE']['common']['session_idletime'] = 0;

$GLOBALS['AUTH'] = new TejimayaAuth(true
	, $GLOBALS['__OpenPNE']['common']['session_lifetime']
	, $GLOBALS['__OpenPNE']['common']['session_idletime']);
$GLOBALS['AUTH']->start();

if(!$GLOBALS['AUTH']->getAuth()){
	_auth_logout();
} else {
	// ユーザーIDを取得
	if (!$u = _db_c_member_id4pc_address_encrypted($GLOBALS['AUTH']->getUsername())) {
		_auth_logout();
	}
	$GLOBALS['AUTH']->uid($u);
}

function _auth_logout()
{
	$GLOBALS['AUTH']->logout();

	if (isset($_POST['username'])) {
		// ユーザ入力でエラー
		client_redirect('normal.php?p=tologin&error_code=login_failed');
	} else {
		client_redirect_login();
	}
	exit;
}

?>
