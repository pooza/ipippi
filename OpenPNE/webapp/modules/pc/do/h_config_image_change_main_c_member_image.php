<?php
/**
メインプロフィール画像の変更

[引数]

[リダイレクト先]
h_config_image

[リダイレクト引数]

[権限]
自分

*/
function doAction_h_config_image_change_main_c_member_image($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$img_num = $request['img_num'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---

	do_h_config_image_change_c_member_main_image($u,$img_num);

	client_redirect("page.php?p=h_config_image");
}

