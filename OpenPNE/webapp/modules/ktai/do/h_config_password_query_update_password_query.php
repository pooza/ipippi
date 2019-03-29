<?php
//-------------------------------------------------------------------
function doAction_h_config_password_query_update_password_query($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$password = $requests['password'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---

	// 現在のパスワードが正しいか
	if (!db_common_authenticate_password($u, $password)) {
		client_redirect("ktai_page.php?p=h_config_password_query&msg=18&" . $tail);
		exit;
	}

	if (!$requests['c_password_query_id']) {
		client_redirect("ktai_page.php?p=h_config_password_query&msg=22&" . $tail);
		exit;
	}
	if (!$requests['password_query_answer']) {
		client_redirect("ktai_page.php?p=h_config_password_query&msg=23&" . $tail);
		exit;
	}

	db_ktai_update_password_query($u, $requests['c_password_query_id'], $requests['password_query_answer']);

	client_redirect("ktai_page.php?p=h_config&msg=24&" . $tail);
}

