<?php



//---------------------------------------------------------------------------
function pageAction_f_intro_edit($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_member_id = $requests['target_c_member_id'];
		// ----------

		//is_friend
		$is_friend = p_common_is_friend($u, $target_c_member_id);

		//--- 権限チェック
		//フレンド
		if ($target_c_member_id == $u) {
	        handle_kengen_error();
		}
		if (!$is_friend) {
			client_redirect("page.php?p=f_link_request_err_yet&target_c_member_id=$target_c_member_id");
			exit;
		}
		//---


		if(p_common_is_access_block($u, $target_c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;

		}

		$smarty->assign('inc_navi',fetch_inc_navi("f",$target_c_member_id));

		$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));
		$smarty->assign("intro_body",p_f_intro_edit_intro_body4c_member_id($u, $target_c_member_id));
		$smarty->assign("target_c_member_id" ,$target_c_member_id);
		$smarty->ext_display("f_intro_edit.tpl");
}

