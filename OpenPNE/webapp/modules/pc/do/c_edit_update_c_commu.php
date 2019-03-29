<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ�����ι���

[����]
target_c_commu_id
name
c_commu_category_id
body
public_flag

[������쥯����]
c_home

[������쥯�Ȱ���]

[����]
���ߥ�˥ƥ�������

*/
function doAction_c_edit_update_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $request['target_c_commu_id'];
	$name = $request['name'];
	$c_commu_category_id = $request['c_commu_category_id'];
	$info = $request['info'];
	$public_flag = $request['public_flag'];
	$is_send_join_mail = $request['is_send_join_mail'];
	// ----------
	$upfile_obj = $_FILES['image_filename'];

    //--- ���¥����å�
    //���ߥ�˥ƥ�������
    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    //---
    
	if(!$name) $err_msg[] = "���ߥ�˥ƥ�̾�����Ϥ��Ƥ�������";
	if(!$info) $err_msg[] = "���ߥ�˥ƥ������������Ϥ��Ʋ�����";
    if($upfile_obj["tmp_name"] && (t_get_image_size($upfile_obj) > 300*1024 || !t_check_image_format($upfile_obj)))
    	$err_msg[] = "����1�Υ�������300KB�����GIF��JPEG��PNG�ˤ��Ƥ�������";

    if ($err_msg) {
		$_REQUEST['err_msg'] = $err_msg;
		$_REQUEST['target_c_commu_id'] = $target_c_commu_id;
		$_REQUEST['name'] = $name;
		$_REQUEST['info'] = $info;
		module_execute('pc', 'page', "c_edit");
		exit;
    }


    //�������åץǡ���
	$sessid = session_id();
	t_image_clear_tmp($sessid);
	if( file_exists($upfile_obj["tmp_name"]) ) $tmpfile = t_image_save2tmp($upfile_obj, $sessid, "c");
	if($tmpfile){
		$image_filename = image_insert_c_image4tmp("c".$target_c_commu_id, $tmpfile);
	}
	t_image_clear_tmp(session_id());

	if($image_filename){
	    //�������
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
?>
