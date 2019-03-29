<?php
// パスワード再発行


function doAction_passwd($requests)
{
	man_init_admin_do();
	$module_name = $GLOBALS['__Framework']['current_module'];
	
	$c_member_id = $requests['target_c_member_id'];
	$password = $requests['password'];
	
    if (!ctype_alnum($password) ||
        strlen($password) < 6 ||
        strlen($password) > 12) {
		admin_client_redirect('passwd',
			"パスワードは6～12文字の半角英数で入力してください", 
			"target_c_member_id=".$c_member_id);
		exit;
    }
	
	if ($requests['password'] !== $requests['password2']) {
		admin_client_redirect('passwd',
			"パスワードが一致していません",
			"target_c_member_id=".$c_member_id);
		exit;
	}
	
	//パスワード変更
	do_common_update_password($c_member_id, $password);
	
	//メール送信
	$c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
	if ($c_member_secure['pc_address']) {
		do_password_query_mail_send($c_member_id, $c_member_secure['pc_address'], $password);
	} else {
		db_mail_send_m_ktai_password_query($c_member_id, $password);
	}
	
	admin_client_redirect('top', "ユーザーのパスワードを変更し、メールを送信しました");	
}


