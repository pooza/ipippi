<?php
//---------------------------------------------------------------------------
/**
プロフィール画像の変更

[引数]
upfile($_FILES[upfile]から取得する)

[リダイレクト先]
h_prof

[リダイレクト引数]

[権限]
自分

*/
function doAction_h_config_image($request) {
	$u = $GLOBALS['AUTH']->uid();

	if( t_get_image_size($_FILES["upfile"]) > 300*1024 ){
		$msg = urlencode("※300KB以内のGIF・JPEG・PNGにしてください。");
		client_redirect("page.php?p=h_config_image&msg=$msg");
		exit();
	}

	if( !t_check_image_format($_FILES["upfile"]) ){
		$msg = urlencode("※300KB以内のGIF・JPEG・PNGにしてください。");
		client_redirect("page.php?p=h_config_image&msg=$msg");
		exit();
	}

	//--- 権限チェック
	//必要なし

	//---


	$c_member = db_common_c_member4c_member_id($u);

	if(!$c_member['image_filename_1'])$img_num=1;
	elseif(!$c_member['image_filename_2'])$img_num=2;
	elseif(!$c_member['image_filename_3'])$img_num=3;
	else{
		$msg = urlencode("画像は3枚までアップロードできます。");
		client_redirect("page.php?p=h_config_image&msg=$msg");
		exit();
	}

	/* 画像は削除しないとアップロードできないようにする？
	 * image_data_delete($c_member['image_filename']);
	 */

	//画像をDBに格納
	$image_filename = image_insert_c_image($_FILES["upfile"],"m_".$u);

	//c_memberのフィールドに登録
	do_h_config_image_new($u, $image_filename, $img_num);

	//画像1の時（最初の画像）メイン画像に
	if($img_num==1) do_h_config_image_change_c_member_main_image($u, 1);
	client_redirect("page.php?p=h_config_image");
}

