<?php
// バナー追加

function doAction_insert_c_banner($requests)
{
	man_init_admin_do();

	$c_banner['a_href'] = $requests['a_href'];
	$c_banner['type'] = $requests['type'];
	$c_banner['nickname'] = $requests['nickname'];
	$c_banner['is_hidden'] = 0;

	//c_banner insert
	$c_banner_id = db_admin_insert_c_banner($c_banner);
	//c_banner insert

	//c_image delete && insert
	$ext = t_check_image_format($_FILES['upfile']);
	$c_banner['image_filename'] = "b_{$c_banner_id}_".time().".{$ext}";
	admin_insert_c_image($_FILES['upfile'], $c_banner['image_filename']);
	//c_image delete && insert

	//c_banner update
	db_admin_update_c_banner($c_banner_id,$c_banner);
	//c_banner update

	admin_client_redirect('edit_c_banner', "バナーを追加しました");
}

