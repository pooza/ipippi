<?php

//---------------------------------------------------------------------------
function pageAction_fh_diary_comment_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_diary_id = $requests['target_c_diary_id'];
	$body = $requests['body'];
	// ----------

	$target_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
	$target_c_member_id = $target_diary['c_member_id']; 

	if (!$target_c_member_id) {
		$target_c_member_id = $u;
	}

	if($target_c_member_id == $u) {
		$type = 'h';

	} else {
		$type = 'f';
		$target_c_member = db_common_c_member4c_member_id($target_c_member_id);

		//日記の公開範囲設定
		if (($target_c_member['public_flag_diary'] == "friend" &&
			 !_db_is_friend($u, $target_c_member_id))) {
		    client_redirect("page.php?p=h_err_diary_access");
		    exit;
		}
		
		// アクセスブロック
		if(p_common_is_access_block($u, $target_c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;
		}
	}

	$smarty->assign('inc_navi',fetch_inc_navi($type));
	$form_val = array(
		"target_c_diary_id" => $target_c_diary_id,
		"body" => $body,
	);

	$smarty->assign("form_val", $form_val);
	$smarty->ext_display("fh_diary_comment_confirm.tpl");
}

