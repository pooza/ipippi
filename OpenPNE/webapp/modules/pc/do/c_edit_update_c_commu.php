<?php
//---------------------------------------------------------------------------
/**
コミュニティ情報の更新

[引数]
target_c_commu_id
name
c_commu_category_id
body
public_flag

[リダイレクト先]
c_home

[リダイレクト引数]

[権限]
コミュニティ管理者

*/
function doAction_c_edit_update_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $request['target_c_commu_id'];
	$name = $request['name'];
	$c_commu_category_id = $request['c_commu_category_id'];
	$info = $request['info'];
	$public_flag = $request['public_flag'];
	$is_send_join_mail = $request['is_send_join_mail'];
	// ----------
	$upfile_obj = $_FILES['image_filename'];

    //--- 権限チェック
    //コミュニティ管理者
    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    //---
    
	if(!$name) $err_msg[] = "コミュニティ名を入力してください";
	if(!$info) $err_msg[] = "コミュニティの説明を入力して下さい";
    if($upfile_obj["tmp_name"] && (t_get_image_size($upfile_obj) > 300*1024 || !t_check_image_format($upfile_obj)))
    	$err_msg[] = "画像1のサイズは300KB以内のGIF・JPEG・PNGにしてください";

    if ($err_msg) {
		$_REQUEST['err_msg'] = $err_msg;
		$_REQUEST['target_c_commu_id'] = $target_c_commu_id;
		$_REQUEST['name'] = $name;
		$_REQUEST['info'] = $info;
		module_execute('pc', 'page', "c_edit");
		exit;
    }


    //画像アップデート
	$sessid = session_id();
	t_image_clear_tmp($sessid);
	if( file_exists($upfile_obj["tmp_name"]) ) $tmpfile = t_image_save2tmp($upfile_obj, $sessid, "c");
	if($tmpfile){
		$image_filename = image_insert_c_image4tmp("c".$target_c_commu_id, $tmpfile);
	}
	t_image_clear_tmp(session_id());

	if($image_filename){
	    //画像削除
	    $c_commu = p_common_c_commu4c_commu_id($target_c_commu_id);
		image_data_delete($c_commu['image_filename']);    
	}    
    
	_do_update_c_commu(
		$target_c_commu_id,
		$target_c_commu_id,
		$name,
		$c_commu_category_id,
		$info,
		$public_flag,
		$image_filename,
		$is_send_join_mail);

	client_redirect("page.php?p=c_home&target_c_commu_id=$target_c_commu_id");
}

