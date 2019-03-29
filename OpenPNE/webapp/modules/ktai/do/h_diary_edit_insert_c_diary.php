<?php
//-----------------------------------------------------------------------------
/**
日記を書く

[引数]
subject
body

[リダイレクト]
fh_diary_list

[リダイレクト引数]
target_c_member_id

[権限]
全ユーザー

*/
function doAction_h_diary_edit_insert_c_diary($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$subject = $requests['subject'];
	$body = $requests['body'];
	$target_c_diary_id = $requests['target_c_diary_id'];
	// ----------

	if(is_null($subject) || $subject === ''){
		//msg=2
		client_redirect("ktai_page.php?p=h_diary_edit&target_c_diary_id=$target_c_diary_id&msg=2&$tail");
		exit();
	}

	if(is_null($body) || $body === ''){
		//msg=1
		client_redirect("ktai_page.php?p=h_diary_edit&target_c_diary_id=$target_c_diary_id&msg=1&$tail");
		exit();
	}

	//--- 権限チェック
	//必要なし

	//---

	$c_member_id = $u;

	if(!$target_c_diary_id){
		$update_c_diary_id = do_h_diary_edit_insert_c_diary($c_member_id, $subject, $body);
	}else{
		$update_c_diary_id = $target_c_diary_id;
	}

	/*
	 * 携帯はWEBでは画像UPLOADなし
	 */
	do_h_diary_edit_update_c_diary($update_c_diary_id, $subject, $body);

	client_redirect("ktai_page.php?p=fh_diary_list&target_c_member_id=$c_member_id&$tail");
}

