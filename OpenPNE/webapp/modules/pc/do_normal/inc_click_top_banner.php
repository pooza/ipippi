<?php
//---------------------------------------------------------------------------
/**
トップのバナーをクリック

[引数]
target_c_banner_id

[リダイレクト先]
無し

[リダイレクト引数]
無し

[権限]

*/
function doNormalAction_inc_click_top_banner($request) {

	// --- リクエスト変数
	$target_c_banner_id = $request['target_c_banner_id'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---
	$p = $_SERVER['HTTP_REFERER'];
	$u = "0";
	
	do_inc_click_top_banner($target_c_banner_id, $u, $p);
	
	$c_banner = do_inc_click_top_banner_c_banner4c_banner_id($target_c_banner_id);
	client_redirect_absolute($c_banner['a_href']);
}
?>
