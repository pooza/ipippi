<?php
function doNormalAction_login($requests)
{
	// --- リクエスト変数
	$c_member_id = $requests['c_member_id'];
	$ktai_address = $requests['ktai_address'];
	$password = $requests['password'];
	// ----------

    if(!$c_member_id = k_auth_login($ktai_address, $password)) {
        // 認証エラー
        client_redirect("ktai_normal.php?p=login&msg=0&kad=".urlencode(t_encrypt($ktai_address)));
        exit;
    }
    
    @session_name('OpenPNE_ktai');
    @session_start();
    @session_regenerate_id();
    
    $_SESSION['c_member_id'] = $c_member_id;
    $_SESSION['timestamp'] = $_SESSION['idle'] = time();
    
    client_redirect("ktai_page.php?p=h_home&ksid=" . session_id());
    exit;
}

