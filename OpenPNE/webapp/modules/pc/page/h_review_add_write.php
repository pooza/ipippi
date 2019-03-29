<?php

function pageAction_h_review_add_write($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- ¥ê¥¯¥¨¥¹¥ÈÊÑ¿ô
		$category_id = $requests['category_id'];
		$asin = $requests['asin'];
		$body = $requests['body'];
		$satisfaction_level = $requests['satisfaction_level'];
		$err_msg = $requests['err_msg'];
		// ----------

		//ÅÐÏ¿ºÑ¤ß¤Ê¤éh_review_edit¤ØÈô¤Ð¤¹
		$c_review_comment = p_h_review_add_write_c_review_comment4asin_c_member_id($asin, $u);
		if($c_review_comment){
			$_REQUEST['c_review_id'] = $c_review_comment['c_review_id'];
			$_REQUEST['asin'] = $asin;
			module_execute('pc', 'page', "h_review_edit");
			exit;

		}

		$smarty->assign('inc_navi',fetch_inc_navi("h"));
		$satisfaction = array(
				"5"	=> "À±5¤Ä",
				"4"	=> "À±4¤Ä",
				"3"	=> "À±3¤Ä",
				"2"	=> "À±2¤Ä",
				"1"	=> "À±1¤Ä",
				);

		$smarty->assign('category_id', $category_id);
		$smarty->assign('asin', $asin);
		$smarty->assign('body', $body);
		$smarty->assign('satisfaction_level', $satisfaction_level);
		$smarty->assign('satisfaction', $satisfaction);
		$smarty->assign('err_msg', $err_msg);

		$product = p_h_review_write_product4asin($asin);

		$smarty->assign('product', $product);
		$smarty->ext_display('h_review_add_write.tpl');	

}
?>
