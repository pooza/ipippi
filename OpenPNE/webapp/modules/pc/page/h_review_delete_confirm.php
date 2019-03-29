<?php

function pageAction_h_review_delete_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_review_comment_id = $requests['c_review_comment_id'];
	$asin = $requests['asin'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->assign('c_review_comment_id', $c_review_comment_id);
	$smarty->assign('asin', $asin);
	$smarty->ext_display('h_review_delete_confirm.tpl');
}

