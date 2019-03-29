<?php
// スキン画像更新

function doAction_update_c_image_skin($requests)
{
	man_init_admin_do();

	$safe_list = array(
		'skin_after_header',
		'skin_before_header',
		'skin_footer',
		'skin_login',
		'skin_navi_c',
		'skin_navi_f',
		'skin_navi_h',
		'no_image.gif',
		'no_logo.gif',
		'no_logo_small.gif',
	);

	if (!$_FILES['upfile']['size']) {
		admin_client_redirect('edit_c_sns_config', "ファイルが指定されていません");
		exit;
	}

	if (in_array($requests['filename'], $safe_list)) {
		image_data_delete($requests['filename']);
		admin_insert_c_image($_FILES['upfile'], $requests['filename']);

		admin_client_redirect('edit_c_sns_config', "スキン画像を変更しました");
		exit;
	}

	admin_client_redirect('edit_c_sns_config', "スキン画像を変更しました");
}

