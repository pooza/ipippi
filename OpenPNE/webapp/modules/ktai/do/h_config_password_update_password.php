<?php
//-------------------------------------------------------------------
function doAction_h_config_password_update_password($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$old_password = $requests['old_password'];
	$new_password = $requests['new_password'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---

	// 現在のパスワードが正しいか
	if (!db_common_authenticate_password($u, $old_password)) {
		client_redirect("ktai_page.php?p=h_config_password&msg=18&" . $tail);
		exit;
	}

	// 新しいパスワードは有効な文字列か
	if (!ctype_alnum($new_password) ||
		strlen($new_password) < 6 ||
		strlen($new_password) > 12) {
		client_redirect("ktai_page.php?p=h_config_password&msg=20&" . $tail);
		exit;
	}

	do_common_update_password($u, $new_password);

	client_redirect("ktai_page.php?p=h_config&msg=21&" . $tail);
}

