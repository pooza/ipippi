<?php

if (empty($_REQUEST['ksid'])) {
	__logout();
}

@session_name('OpenPNE_ktai');
@session_id($_REQUEST['ksid']);
@session_start();

if (empty($_SESSION['c_member_id']) || !k_auth($_SESSION['c_member_id'])) {
	__logout(15);
}

// セッションの有効期限
$lifetime = $GLOBALS['__OpenPNE']['ktai']['session_lifetime'];
$idletime = $GLOBALS['__OpenPNE']['ktai']['session_idletime'];
if (!isset($_SESSION['timestamp']) ||
	($liftime && ($_SESSION['timestamp'] + $lifetime) < time())
	) {
	__logout(15, $_SESSION['c_member_id']);
}
if (!isset($_SESSION['idle']) ||
    ($idletime && ($_SESSION['idle'] + $idletime) < time())
    ) {
	__logout(15, $_SESSION['c_member_id']);
}

$_SESSION['idle'] = time();

$GLOBALS['KTAI_C_MEMBER_ID'] = $_SESSION['c_member_id'];
$GLOBALS['KTAI_URL_TAIL'] = "ksid=" . session_id();


function __logout($msg = 0, $c_member_id = 0)
{
	@session_destroy();
	
	$url = "ktai_normal.php?p=login";
	if ($msg) {
		$url .= "&msg=$msg";
	}
	if ($c_member_id) {
		$c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
		$url .= "&kad=" . urlencode(t_encrypt($c_member_secure['ktai_address']));
	}
	client_redirect($url);
	exit;
}

?>