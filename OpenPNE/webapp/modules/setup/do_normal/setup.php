<?php

function doNormalAction_setup($requests)
{
	// c_member_secureにデータがあった場合は無効
	$sql = "SELECT c_member_secure_id FROM c_member_secure LIMIT 1";
	if (get_one4db($sql)) exit;

	if (!$requests['pc_address']) {
		$msg = "メールアドレスを入力してください";
		client_redirect("module_normal.php?m=setup&p=setup".
			"&msg=" . urlencode($msg));
		exit;
	}
	$password = $requests['password'];
	if (!ctype_alnum($password) ||
		strlen($password) < 6 ||
		strlen($password) > 40) {
		$msg = "パスワードは6～40文字の半角英数で入力してください";
		client_redirect("module_normal.php?m=setup&p=setup".
			"&msg=" . urlencode($msg));
		exit;
	}

	if (!$requests['admin_username']) {
		$msg = "ユーザ名を入力してください";
		client_redirect("module_normal.php?m=setup&p=setup".
			"&msg=" . urlencode($msg));
		exit;
	}
	$password = $requests['admin_password'];
	if (!ctype_alnum($password) ||
		strlen($password) < 6 ||
		strlen($password) > 40) {
		$msg = "パスワードは6～40文字の半角英数で入力してください";
		client_redirect("module_normal.php?m=setup&p=setup".
			"&msg=" . urlencode($msg));
		exit;
	}

	// c_member_secure
	$data = array(
		"c_member_id" => 1,
		"hashed_password" => password_hash($requests['password'], PASSWORD_DEFAULT),
		"pc_address" => t_encrypt($requests['pc_address']),
		"regist_address" => t_encrypt($requests['pc_address']),
	);
	$keys = implode(',', array_keys($data));
	$values = implode(",", array_values(array_map("quote4db", $data)));

	$sql = "INSERT INTO c_member_secure($keys) VALUES($values)";
	_insert4db($sql);

	// c_admin_user
	$sql = "INSERT INTO c_admin_user(username, password)" .
		" VALUES (".quotearray4db($requests['admin_username'], md5($requests['admin_password'])).")";
	_insert4db($sql);

	client_redirect('module_normal.php?m=setup&p=setup_done');
}

