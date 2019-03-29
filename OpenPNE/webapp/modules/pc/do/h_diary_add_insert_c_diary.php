<?php
//---------------------------------------------------------------------------
/**
 * 日記を書く
 */
function doAction_h_diary_add_insert_c_diary($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$subject = $request['subject'];
	$body = $request['body'];
	$tmpfile_1 = $request['tmpfile_1'];
	$tmpfile_2 = $request['tmpfile_2'];
	$tmpfile_3 = $request['tmpfile_3'];
	$image_position = $request['image_position'];
	// ----------

	if (is_null($body) || $body === '') {
		$_REQUEST['msg'] = "本文を入力してください";
		$_REQUEST['subject'] = $subject;
		module_execute('pc', 'page', "h_diary_add");
		exit;
	}

	if (is_null($subject) || $subject === '') {
		$_REQUEST['msg'] = "タイトルを入力してください";
		$_REQUEST['body'] = $body;
		module_execute('pc', 'page', "h_diary_add");
		exit;
	}

	//--- 権限チェック
	//誰でも書ける

	//---

	$sessid = session_id();
	$c_member_id = $u;

	$c_diary_id = do_h_diary_edit_insert_c_diary($c_member_id, $subject, $body);

	$filename_1 = image_insert_c_image4tmp("d_1_".$c_diary_id, $tmpfile_1);
	$filename_2 = image_insert_c_image4tmp("d_2_".$c_diary_id, $tmpfile_2);
	$filename_3 = image_insert_c_image4tmp("d_3_".$c_diary_id, $tmpfile_3);

	t_image_clear_tmp($sessid);
	do_h_diary_edit_update_c_diary($c_diary_id, $subject, $body, $filename_1, $filename_2, $filename_3, $image_position);

	client_redirect("page.php?p=fh_diary&target_c_diary_id=$c_diary_id");
}

