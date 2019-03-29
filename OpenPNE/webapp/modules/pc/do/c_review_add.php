<?php
function doAction_c_review_add($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$category_id = $request['category_id'];
	$asin = $request['asin'];
	$body = $request['body'];
	$satisfaction_level = $request['satisfaction_level'];
	// ----------

	//--- 権限チェック
	//必要なし	

	//---


	$product = p_h_review_write_product4asin($asin);

	//c_reviewへ登録
	$c_review_id = do_c_review_add_insert_c_review($product, $category_id);

	//c_review_commentへ登録
	if($c_review_id) do_c_review_add_insert_c_review_comment($c_review_id, $u, $body, $satisfaction_level);

	client_redirect("page.php?p=h_review_list_product&c_review_id=".$c_review_id);

}
?>
