<?php
function normalAction_regist_prof_1($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
	//>

	// --- リクエスト変数
	$sid = $requests['sid'];
	$err_msg = $requests['err_msg'];
	$profs = $_REQUEST['profs'];
	// ----------

	if (!n_regist_intro_is_active_sid($sid)) {
		$msg = "この招待URLは既に無効になっています。";
		client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
		exit;
	}

	$smarty->assign('err_msg', $err_msg);
	$smarty->assign('profs', $profs);

	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("regist") );

	$c_member_pre = p_common_c_member_pre4c_member_pre_session($sid);

	$smarty->assign("sid", $sid);
	$smarty->assign("pc_address", $c_member_pre['pc_address']);

	$public_flags = array(
		'public' => '全員に公開',
		'friend' => WORD_MY_FRIEND.'まで公開',
		'private'=> '公開しない',
	);
	$smarty->assign('public_flags', $public_flags);

	$smarty->assign("month_list", p_regist_prof_c_profile_month_list4null());
	$smarty->assign("day_list", p_regist_prof_c_profile_day_list4null());
	$smarty->assign("query_list", p_common_c_password_query4null());

	$smarty->assign("c_profile_list", db_common_c_profile_list());

	$smarty->ext_display("regist_prof_1.tpl");
}
