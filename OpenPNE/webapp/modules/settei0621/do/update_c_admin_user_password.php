<?php
// パスワード再発行


function doAction_update_c_admin_user_password($requests)
{
	man_init_admin_do();
	
	if (!db_admin_authenticate_password(
			$GLOBALS['AUTH']->uid(),
			$requests['old_password'])) {
		admin_client_redirect('edit_admin_password',
			"パスワードが違います");
		exit;
	}
	
	$password = $requests['new_password'];
    if (!ctype_alnum($password) ||
        strlen($password) < 6 ||
        strlen($password) > 12) {
		admin_client_redirect('edit_admin_password',
			"パスワードは6～12文字の半角英数で入力してください");
		exit;
    }
	
	if ($requests['new_password'] !== $requests['new_password2']) {
		admin_client_redirect('edit_admin_password',
			"パスワードが一致していません");
		exit;
	}
	
	//パスワード変更
	db_admin_update_c_admin_user_password($GLOBALS['AUTH']->uid(), $password);
	
	$GLOBALS['AUTH']->t_logout();
	
	$hash_tbl =& AdminHashTable::singleton();
	$p = $hash_tbl->hash('login', 'normal');
	$m = $GLOBALS['__Framework']['current_module'];
	$msg = "パスワードを変更しました。新しいパスワードでログインしなおしてください。";
	client_redirect("module_normal.php?m=$m&p=$p&msg=" . urlencode($msg));	
}

