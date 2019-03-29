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
function doAction_f_link_request($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	$c_member_id_from	= $u;
	$c_member_id_to		= $target_c_member_id;

	$status = do_common_get_f_link_status($c_member_id_from,$c_member_id_to);

	switch($status){
		//リクエスト(承認送信画面)
		case STATUS_F_LINK_FLAT;
			client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&$tail");
		break;
		//リクエスト(リンク承認待ち)
		case STATUS_F_LINK_WAIT;
		//msg=5 "このフレンドは、現在リンク承認待ちです。"
			client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&msg=5&$tail");
		break;
		//リクエスト(フレンドリンク済)
		case STATUS_F_LINK_ALREADY;
		//msg=6 "このフレンドは、すでにリンク済みです。"
			client_redirect("ktai_page.php?p=f_link_request&target_c_member_id=$target_c_member_id&msg=6&$tail");
 		break;
	}
}

?>