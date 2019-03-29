<?php
//---------------------------------------------------------------------------
/**
 * 退会する
 */
function doAction_h_taikai($request) {
	$password = $request['password'];
	$u = $GLOBALS['AUTH']->uid();

	if (!db_common_authenticate_password($u, $password)) {
		$msg = "パスワードが間違っています";
		client_redirect("page.php?p=h_taikai_confirm&msg=".urlencode($msg));
		exit;
	}

	//退会完了メール送信
	do_common_send_mail_taikai_end_pc($u);

	//退会処理
	db_common_delete_c_member($u);

	//ログアウト
	$GLOBALS['AUTH']->t_logout();
	$msg = "退会完了しました。ご利用ありがとうございました。";
	client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
}

