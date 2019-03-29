<?php
//---------------------------------------------------------------------------
/**
 * 退会する
 */
function doAction_h_taikai($request) {
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	$password = $request['password'];
	if (!db_common_authenticate_password($u, $password)) {
		client_redirect("ktai_page.php?p=h_taikai_confirm&msg=18&".$tail);
		exit;
	}
	
	//退会完了メール送信
	do_common_send_mail_taikai_end_ktai($u);

	//退会処理
	db_common_delete_c_member($u);
	
	@session_destroy();
	client_redirect("ktai_normal.php?p=taikai_end");
}
?>
