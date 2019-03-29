<?php
function doNormalAction_easy_login($requests)
{
    if(!$c_member_id = db_ktai_c_member_id4easy_access_id(k_common_get_easy_access_id())) {
        // 認証エラー
        client_redirect("ktai_normal.php?p=login&msg=14&kad=".urlencode(t_encrypt($requests['ktai_address'])));
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

