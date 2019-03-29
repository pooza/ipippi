<?php
/**
プロフィール画像の削除

[引数]


[リダイレクト先]
h_config_image

[リダイレクト引数]

[権限]
自分

*/
function doAction_h_config_image_delete_c_member_image($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$img_num = $request['img_num'];
	// ----------

	//--- 権限チェック
	//必要なし

	//---


	$c_member = db_common_c_member4c_member_id($u);
	image_data_delete($c_member['image_filename_'.$img_num]);
	do_h_config_image_delete_c_member_image_new($u, $img_num);

	if ($c_member['image_filename'] == $c_member['image_filename_'.$img_num]) {
    	do_h_config_image_change_c_member_main_image($u, 1);
	}
    
    client_redirect("page.php?p=h_config_image");
}
?>
