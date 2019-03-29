<?php
function doNormalAction_password_query($requests)
{
	//--- 権限チェック
	//パスワード確認の質問と答えがあっている

	if (!$c_member_id = db_ktai_is_password_query_complete(
					$requests['ktai_address'],
					$requests['c_password_query_id'],
					$requests['password_query_answer'])) {
		client_redirect("ktai_normal.php?p=password_query&msg=25");
		exit;
	}
	//---

	// パスワード再発行
	$new_password = do_common_create_password();
	do_common_update_password($c_member_id, $new_password);

	db_mail_send_m_ktai_password_query($c_member_id, $new_password);

	client_redirect("ktai_normal.php?p=login&msg=26");
	exit;
}

