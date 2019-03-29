<?php
//---------------------------------------------------------------------------
/**
フレンドリクエストを送る

[引数]
target_c_member_id
body

[リダイレクト先]
f_link_request

[リダイレクト引数]

[権限]
フレンド関係に無いユーザー

*/
function doAction_f_link_request_insert_c_friend_confirm($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	$body = $requests['body'];
	// ----------

	$c_member_id_from	= $u;

	//--- 権限チェック
	//フレンドでない and フレンド承認待ちでない

	$status = db_common_friend_status($u, $target_c_member_id);
	if ($status['is_friend']) {
		client_redirect("ktai_page.php?p=f_link_request_err_already&target_c_member_id=$target_c_member_id&$tail");
		exit;
	} elseif($status['is_friend_confirm']) {
		client_redirect("ktai_page.php?p=f_link_request_err_wait&target_c_member_id=$target_c_member_id&$tail");
		exit;
	}

	// アクセスブロック
	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&$tail");
		exit;
	}
	// -----

	if($body == null){
		//msg = 1
		client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&msg=1&$tail");
		exit();
	}

	do_f_link_request_insert_c_friend_confirm($c_member_id_from,$target_c_member_id,$body);

	//メッセージ
	$c_member_to	= db_common_c_member4c_member_id($target_c_member_id);
	$c_member_from	= db_common_c_member4c_member_id($c_member_id_from);

	$subject =WORD_FRIEND."リンク要請メッセージ";
	$body_disp =
		$c_member_from['nickname']." さんから".WORD_FRIEND."リンク要請のメッセージが届いています。\n".
		"\n".
		"メッセージ：\n".
		$body."\n".
		"\n".
		"この要請について、承認待ちリストから承認または拒否を選択してください。";

	do_common_send_message_syoudaku($c_member_id_from, $target_c_member_id, $subject, $body_disp);

	client_redirect("ktai_page.php?p=f_home&target_c_member_id=$target_c_member_id&$tail");
}

