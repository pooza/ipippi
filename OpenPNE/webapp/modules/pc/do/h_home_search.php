<?php
function doAction_h_home_search($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$q = $request['q'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---


	if (isset($_REQUEST['community_x'])) {
		$word = urlencode(mb_convert_encoding($q, "UTF-8", "EUC-JP,SJIS,UTF-8,JIS"));
		client_redirect("page.php?p=h_com_find_all&keyword=".$word);
		exit;
	}
	else if (isset($_REQUEST['web_x'])) {
		$word = urlencode(mb_convert_encoding($q, "UTF-8", "EUC-JP,SJIS,UTF-8,JIS"));
		$url = "http://www.google.co.jp/search?hl=ja&q=" . $word;
		client_redirect_absolute($url);
		exit;
	}
	else { // default
		$word = urlencode(mb_convert_encoding($q, "UTF-8", "EUC-JP,SJIS,UTF-8,JIS"));
		client_redirect("page.php?p=h_diary_list_all&keyword=".$word);
		exit;
	}
}
?>
