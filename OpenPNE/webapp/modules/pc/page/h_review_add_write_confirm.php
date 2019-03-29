<?php

function pageAction_h_review_add_write_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$category_id = $requests['category_id'];
	$asin = $requests['asin'];
	$body = $requests['body'];
	$satisfaction_level = $requests['satisfaction_level'];
	// ----------

	if(!$body) $err_msg[] = "レビューを入力して下さい";
	if(!$satisfaction_level) $err_msg[] = "満足度を入力して下さい";

	if($err_msg){
		$_REQUEST['err_msg'] = $err_msg;
		$_REQUEST['category_id'] = $category_id;
		$_REQUEST['body'] = $body;
		$_REQUEST['satisfaction_level'] = $satisfaction_level;
		$_REQUEST['asin'] = $asin;
		module_execute('pc', 'page', "h_review_add_write");
		exit;
	}

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->assign('category_id', $category_id);
	$smarty->assign('asin', $asin);
	$smarty->assign('body', $body);
	$smarty->assign('satisfaction_level', $satisfaction_level);

	$smarty->ext_display('h_review_add_write_confirm.tpl');	
}

