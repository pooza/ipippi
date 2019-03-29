<?php
//---------------------------------------------------------------------------
/**
フレンドリクエストを送る

[引数]
target_c_member_id

[リダイレクト先]
f_link_requestのどれか

[リダイレクト引数]

[権限]
フレンド関係に無いユーザー

*/
function doAction_f_link_request($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	$c_member_id_from	= $u;
	$c_member_id_to		= $target_c_member_id;

	$status = do_common_get_f_link_status($c_member_id_from,$c_member_id_to);

	switch($status) {
	//リクエスト(承認送信画面)
	case STATUS_F_LINK_FLAT;
		client_redirect("page.php?p=f_link_request&target_c_member_id=$target_c_member_id");
		break;
	//リクエスト(リンク承認待ち)
	case STATUS_F_LINK_WAIT;
		client_redirect("page.php?p=f_link_request_err_wait&target_c_member_id=$target_c_member_id");
		break;
	//リクエスト(フレンドリンク済)
	case STATUS_F_LINK_ALREADY;
		client_redirect("page.php?p=f_link_request_err_already&target_c_member_id=$target_c_member_id");
		break;
	}
}

