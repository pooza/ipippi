<?php
function doAction_h_diary_edit_delete_image($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_diary_id = $request['target_c_diary_id'];
	$del_img = $request['del_img'];
	// ----------

	//--- 権限チェック
	//日記作成者

    $c_diary = p_fh_diary_c_diary4c_diary_id($c_diary_id);
	//日記を書いた人でないと消せない
	if($c_diary['c_member_id'] != $u){
		client_redirect("page.php?p=h_home");
	}	
	//---

		
	image_data_delete($c_diary['image_filename_'. $del_img]);
	do_c_diary_edit_delete_c_diary_image($c_diary_id, $del_img);

	client_redirect("page.php?p=h_diary_edit&target_c_diary_id=".$c_diary_id);
}

