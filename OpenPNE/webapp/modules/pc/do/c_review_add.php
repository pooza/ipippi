<?php
function doAction_c_review_add($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$category_id = $request['category_id'];
	$asin = $request['asin'];
	$body = $request['body'];
	$satisfaction_level = $request['satisfaction_level'];
	// ----------

	//--- ���¥����å�
	//ɬ�פʤ�	

	//---


	$product = p_h_review_write_product4asin($asin);

	//c_review����Ͽ
	$c_review_id = do_c_review_add_insert_c_review($product, $category_id);

	//c_review_comment����Ͽ
	if($c_review_id) do_c_review_add_insert_c_review_comment($c_review_id, $u, $body, $satisfaction_level);

	client_redirect("page.php?p=h_review_list_product&c_review_id=".$c_review_id);

}
?>
