<?php
function doNormalAction_update_ktai_address($requests)
{
    
	// --- リクエスト変数
	$ses = $requests['ses'];
	$password = $requests['password'];
	// ----------
    
    // セッションが有効かどうか
    if (!$pre = c_ktai_address_pre4session($ses)) {
        // 無効の場合、login へリダイレクト
        client_redirect("ktai_normal.php?p=login");
        exit;
    }

    $c_member_id = $pre['c_member_id'];
    $ktai_address = $pre['ktai_address'];
    
    // パスワードチェック
    if (!db_common_authenticate_password($c_member_id, $password)) {
    	client_redirect("ktai_normal.php?p=login2&msg=18&ses=" . $ses);
    	exit;
    }

    k_do_update_ktai_address($c_member_id, $ktai_address);
    k_do_delete_ktai_address_pre($pre['c_ktai_address_pre_id']);
    
    // login ページへリダイレクト
    client_redirect("ktai_normal.php?p=login&msg=19&kad=" . urlencode(t_encrypt($ktai_address)));
    exit;
}

