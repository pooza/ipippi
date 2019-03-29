<?php

//---------------------------------------------------------------------------
function pageAction_f_link_request($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_member_id = $requests['target_c_member_id'];
		$body = $requests['body'];
		// ----------

		$frined_status=db_common_friend_status($u, $target_c_member_id);

		if($target_c_member_id == $u){
			client_redirect("page.php?p=h_home");
			exit;
		}

		if($frined_status['is_friend']){
			client_redirect("page.php?p=f_link_request_err_already&target_c_member_id=".$target_c_member_id);
			exit;
		}

		if($frined_status['is_friend_confirm']){
			client_redirect("page.php?p=f_link_request_err_wait&target_c_member_id=".$target_c_member_id);
			exit;
		}

		if(p_common_is_access_block($u, $target_c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;

		}

	$smarty->assign('inc_navi',fetch_inc_navi("f",$target_c_member_id));

	//ターゲット情報
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	//紹介文の内容
	//$smarty->assign("request_body",p_f_link_request_request_body4c_member_id($u, $target_c_member_id));

	//ターゲットのid
	$smarty->assign("target_c_member_id" ,$target_c_member_id);

	$form_val=array(
	  'target_c_member_id'=>$target_c_member_id,
	  'body'=>$body,
	  );
	//$smarty->assign("form_val" ,$form_val);
	$smarty->assign("form" ,$form_val);

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("f_link_request.tpl");

}

