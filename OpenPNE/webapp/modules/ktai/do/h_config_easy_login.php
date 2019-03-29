<?php

function doAction_h_config_easy_login($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// 現在のパスワードが正しいか
	if (!db_common_authenticate_password($u, $requests['password'])) {
		client_redirect("ktai_page.php?p=h_config_easy_login&msg=18&" . $tail);
		exit;
	}

	if (!$easy_access_id = k_common_get_easy_access_id()) {
		client_redirect("ktai_page.php?p=h_config_easy_login&msg=27&" . $tail);
		exit;
	}
	
	if (!$requests['delete']) {
		// update
		db_ktai_update_easy_access_id($u, $easy_access_id);
		client_redirect("ktai_page.php?p=h_config&msg=28&" . $tail);
	} else {
		// delete
		db_ktai_update_easy_access_id($u, '');
		client_redirect("ktai_page.php?p=h_config&msg=29&" . $tail);
	}
}

?>