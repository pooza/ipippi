<?php
//shou050531
//---------------------------------------------------------------------------
/**
日記を修正

[引数]
title
body
画像バイナリ($_FILES[upfile_1],$_FILES[upfile_2],$_FILES[upfile_3])で得る。

[リダイレクト]
fh_diary_list

[リダイレクト引数]
target_c_member_id

[権限]
全ユーザー

*/
function doAction_h_diary_edit_insert_c_diary($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_diary_id = $request['target_c_diary_id'];
	$subject = $request['subject'];
	$body = $request['body'];
	$image_position = $request['image_position'];
	$tmpfile_1 = $request['tmpfile_1'];
	$tmpfile_2 = $request['tmpfile_2'];
	$tmpfile_3 = $request['tmpfile_3'];
	// ----------

	if (is_null($body) || $body === '') {
		$_REQUEST['msg'] = "本文を入力してください";
		$_REQUEST['subject'] = $subject;
		module_execute('pc', 'page', "h_diary_edit");
		exit;
	}

	if (is_null($subject) || $subject === '') {
		$_REQUEST['msg'] = "タイトルを入力してください";
		$_REQUEST['body'] = $body;
		module_execute('pc', 'page', "h_diary_edit");
		exit;
	}

	//--- 権限チェック
	//日記作成者

	$c_diary = _db_c_diary4c_diary_id($target_c_diary_id);
	if ($c_diary['c_member_id'] != $u) {
		handle_kengen_error();
	}
	//---

	$sessid = session_id();

	$filename_1 = $filename_2 = $filename_3 = '';
	$c_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);

	if ($tmpfile_1) {
		image_data_delete($c_diary['image_filename_1']);
		$filename_1 = image_insert_c_image4tmp("d_1_".$target_c_diary_id, $tmpfile_1);
	}
	if ($tmpfile_2) {
		image_data_delete($c_diary['image_filename_2']);
		$filename_2 = image_insert_c_image4tmp("d_2_".$target_c_diary_id, $tmpfile_2);
	}
	if ($tmpfile_3) {
		image_data_delete($c_diary['image_filename_3']);
		$filename_3 = image_insert_c_image4tmp("d_3_".$target_c_diary_id, $tmpfile_3);
	}

	t_image_clear_tmp($sessid);
	do_h_diary_edit_update_c_diary($target_c_diary_id, $subject, $body, $filename_1, $filename_2, $filename_3, $image_position);

	client_redirect("page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id");
}

