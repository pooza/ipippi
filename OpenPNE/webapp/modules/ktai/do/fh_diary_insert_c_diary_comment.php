<?php
//----------------------------------------------------------------------------------
/**
日記コメント追加

[引数]
target_c_diary_id
body

[リダイレクト]
fh_diary

[リダイレクト引数]
target_c_diary_id

[権限]
全メンバー

*/
function doAction_fh_diary_insert_c_diary_comment($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_diary_id = $requests['target_c_diary_id'];
	$body = $requests['body'];
	// ----------

	if (is_null($body) || $body === ''){
		//msg=1 "本文を入力して下さい。"
		client_redirect("ktai_page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id&msg=1&$tail");
		exit();
	}

	//--- 権限チェック
	
	$c_diary = _db_c_diary4c_diary_id($target_c_diary_id);
	$target_c_member_id = $c_diary['c_member_id'];
	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);

	//日記の公開範囲設定
	if ($target_c_member['public_flag_diary'] == "friend" &&
		!_db_is_friend($u, $target_c_member_id) && $target_c_member_id != $u) {
	    client_redirect("page.php?p=h_access_block&".$tail);
	    exit;
	}
	
    //アクセスブロック設定
	if (p_common_is_access_block($u, $target_c_member_id)) {
		client_redirect("page.php?p=h_access_block&".$tail);
		exit;
	}
	//---

	do_fh_diary_insert_c_diary_comment($u, $target_c_diary_id, $body);
	//日記コメントが書き込まれたので日記自体を未読扱いにする
	p_h_diary_update_c_diary_is_checked4c_dirary_id($target_c_diary_id, "0");
	
	client_redirect("ktai_page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id&$tail");
}

?>