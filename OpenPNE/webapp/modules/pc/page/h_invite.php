<?php



//---------------------------------------------------------------------------
function pageAction_h_invite($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$form_val = $requests;
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('form_val',$form_val);
	$smarty->assign('SNS_NAME', SNS_NAME);

	$smarty->assign('inviting_member', h_invite_inviting_member4c_member_id($u));
	$smarty->assign('k_inviting_member', k_h_invite_inviting_member4c_member_id($u));


	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("h_invite.tpl");
}

