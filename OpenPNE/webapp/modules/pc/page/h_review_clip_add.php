<?php

function pageAction_h_review_clip_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_review_id = $requests['c_review_id'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->assign('c_review', p_h_review_list_product_c_review4c_review_id($c_review_id));
	$smarty->ext_display('h_review_clip_add.tpl');	
}

