<?php

function pageAction_h_review_edit($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$asin = $requests['asin'];
	$err_msg = $requests['err_msg'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->assign('err_msg', $err_msg);
	$satisfaction = array(
			"5"	=> "星5つ",
			"4"	=> "星4つ",
			"3"	=> "星3つ",
			"2"	=> "星2つ",
			"1"	=> "星1つ",
			);
	$smarty->assign('satisfaction', $satisfaction);

	$c_review_comment = p_h_review_add_write_c_review_comment4asin_c_member_id($asin, $u);
	$smarty->assign('c_review_comment', $c_review_comment);

	$smarty->ext_display('h_review_edit.tpl');
}

