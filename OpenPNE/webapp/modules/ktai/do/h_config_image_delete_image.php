<?php

//-----------------------------------------------------------------------
function doAction_h_config_image_delete_image($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	// ----------

	//--- 権限チェック
	//---

	$c_member = db_common_c_member4c_member_id($u);

	// メイン画像を削除する
	image_data_delete($c_member['image_filename']);

	$img_num = 0;
	if ($c_member['image_filename'] == $c_member['image_filename_1'])
		$img_num = 1;
	elseif ($c_member['image_filename'] == $c_member['image_filename_2'])
		$img_num = 2;
	elseif ($c_member['image_filename'] == $c_member['image_filename_3'])
		$img_num = 3;

	do_h_config_image_delete_c_member_image_new($u, $img_num);
   	do_h_config_image_change_c_member_main_image($u, 1);

	client_redirect("ktai_page.php?p=h_config_image&{$tail}");
}

