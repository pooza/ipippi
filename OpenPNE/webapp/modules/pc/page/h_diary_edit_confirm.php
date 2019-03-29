<?php

function pageAction_h_diary_edit_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_diary_id = $requests['target_c_diary_id'];
	$subject = $requests['subject'];
	$body = $requests['body'];
	$image_position = $requests['image_position'];
	// ----------

	$sessid = session_id();
	t_image_clear_tmp($sessid);

	$upfiles = array(
		1 => $_FILES['upfile_1'],
		$_FILES['upfile_2'],
		$_FILES['upfile_3'],
	);
	$tmpfiles = array(
		1 => '',
		'',
		'',
	);

	$limit_size = 300 * 1024; // 300KB

	foreach ($upfiles as $key => $upfile) {
		if (file_exists($upfile["tmp_name"])) {
			if (t_get_image_size($upfile) > $limit_size) {
				$_REQUEST['msg'] = '※300KB以内のGIF・JPEG・PNGにしてください。';
				module_execute('pc', 'page', "h_diary_edit");
				exit;
			}
			if (!$format = t_check_image_format($upfile)) {
				$_REQUEST['msg'] = '※300KB以内のGIF・JPEG・PNGにしてください。';
				module_execute('pc', 'page', "h_diary_edit");
				exit;
			}
			$tmpfiles[$key] = t_image_save2tmp($upfile, $sessid, "d_$key", $format);
		}
	}

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	//プロフィール
	$smarty->assign("member", db_common_c_member4c_member_id($u));

	$form_val = array(
		"target_c_diary_id" => $target_c_diary_id,
		"del_img" => $_REQUEST['del_img'],
		"subject" => $subject,
		"body" => $body,
		"upfile_1" => $_FILES['upfile_1'],
		"upfile_2" => $_FILES['upfile_2'],
		"upfile_3" => $_FILES['upfile_3'],
		"tmpfile_1" => $tmpfiles[1],
		"tmpfile_2" => $tmpfiles[2],
		"tmpfile_3" => $tmpfiles[3],
		"image_position" => $image_position,
	);
	$smarty->assign("form_val", $form_val);

	$smarty->ext_display("h_diary_edit_confirm.tpl");
}

