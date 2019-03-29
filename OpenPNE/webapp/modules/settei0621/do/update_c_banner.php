<?php
// バナー編集

function doAction_update_c_banner($requests)
{
	man_init_admin_do();

	$c_banner_id = $requests['c_banner_id'];

	//c_image delete && insert
	if ($_FILES['upfile']['name']) {
		db_admin_delete_c_image4c_banner_id($c_banner_id);

		$ext = t_check_image_format($_FILES['upfile']);
		$c_banner['image_filename'] = "b_{$c_banner_id}_".time().".{$ext}";
		admin_insert_c_image($_FILES['upfile'], $c_banner['image_filename']);
	}
	//c_image delete && insert

	$c_banner['a_href'] = $requests['a_href'];
	$c_banner['type'] = $requests['type'];
	$c_banner['nickname'] = $requests['nickname'];
	$c_banner['is_hidden'] = $requests['is_hidden'];

	//c_banner update
	db_admin_update_c_banner($c_banner_id, $c_banner);
	//c_banner update

	admin_client_redirect('edit_c_banner', "バナーを変更しました");
}

