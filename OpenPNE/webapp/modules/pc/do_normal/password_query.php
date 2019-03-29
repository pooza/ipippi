<?php
function doNormalAction_password_query($requests)
{
	// --- リクエスト変数
	$pc_address = $requests['pc_address'];
	$c_password_query_id = $requests['c_password_query_id'];
	$c_password_query_answer = $requests['c_password_query_answer'];
	// ----------

	//--- 権限チェック
	//パスワード確認の質問と答えがあっている

	if (!$c_member_id = do_password_query_is_password_query_complete($pc_address,
					$c_password_query_id,$c_password_query_answer)) {
		$msg = urlencode("パスワード再取得失敗");
		client_redirect("normal.php?p=password_query&msg=$msg");
		exit;
	}
	//---

	// パスワード再発行
	$new_password = do_common_create_password();
	do_common_update_password($c_member_id, $new_password);

	do_password_query_mail_send($c_member_id, $pc_address, $new_password);

	$msg = "パスワードをメールで送信しました。";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
}
