<?php

function pageAction_c_topic_write_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$c_commu_topic_id = $requests['target_c_commu_topic_id'];
		$body = $requests['body'];
		$image_position = $requests['image_position'];
		$button = $requests['button'];
		// ----------

	//TODO:画像バリデータ
		$upfile_obj1 = $_FILES['image_filename1'];
		$upfile_obj2 = $_FILES['image_filename2'];
		$upfile_obj3 = $_FILES['image_filename3'];

		$upfile_obj11 = $_FILES['file_filename1'];
		$upfile_obj12 = $_FILES['file_filename2'];
		$upfile_obj13 = $_FILES['file_filename3'];

		//エラーチェック
		$err_msg = array();
		if($upfile_obj1["tmp_name"] && (t_get_image_size($upfile_obj1) > 300*1024 || !t_check_image_format($upfile_obj1)))
			$err_msg[] = "画像1のサイズは300KB以内のGIF・JPEG・PNGにしてください";
		if($upfile_obj2["tmp_name"] && (t_get_image_size($upfile_obj2) > 300*1024 || !t_check_image_format($upfile_obj2)))
			$err_msg[] = "画像2のサイズは300KB以内のGIF・JPEG・PNGにしてください";
		if($upfile_obj3["tmp_name"] && (t_get_image_size($upfile_obj3) > 300*1024 || !t_check_image_format($upfile_obj3)))
			$err_msg[] = "画像3のサイズは300KB以内のGIF・JPEG・PNGにしてください";

		$names = array();
		for ($i = 1 ; $i <= 3 ; $i ++) {
			$varname = 'upfile_obj1' . $i;
			$name = $$varname;
			if ($name = $name['name']) {
				if (in_array($name, $names)) {
					$err_msg[] = "添付ファイルのファイル名が重複します";
					break;
				}
				$names[] = $name;
			}
		}

		if($upfile_obj11["tmp_name"] && (t_get_image_size($upfile_obj11) > 1024*1024))
			$err_msg[] = "添付ファイル1のサイズは1MB以内にしてください";
		if($upfile_obj12["tmp_name"] && (t_get_image_size($upfile_obj12) > 1024*1024))
			$err_msg[] = "添付ファイル2のサイズは1MB以内にしてください";
		if($upfile_obj13["tmp_name"] && (t_get_image_size($upfile_obj13) > 1024*1024))
			$err_msg[] = "添付ファイル3のサイズは1MB以内にしてください";

		if(is_dirty_file($upfile_obj11))
			$err_msg[] = get_extension($upfile_obj11['name']) . "ファイルは添付できません";
		if(is_dirty_file($upfile_obj12))
			$err_msg[] = get_extension($upfile_obj12['name']) . "ファイルは添付できません";
		if(is_dirty_file($upfile_obj13))
			$err_msg[] = get_extension($upfile_obj13['name']) . "ファイルは添付できません";

		if ($err_msg) {
			$_REQUEST['err_msg'] = $err_msg;
			module_execute('pc', 'page', "c_topic_detail");
			exit;
		}
	//-----

		$c_topic = c_topic_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
		$c_commu_id = $c_topic['c_commu_id'];

		//--- 権限チェック
		if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$u)){
			handle_kengen_error();
		}
		//---

		$sessid = session_id();
		t_image_clear_tmp($sessid);
		$tmpfile1 = t_image_save2tmp($upfile_obj1, $sessid, "tw1");
		$tmpfile2 = t_image_save2tmp($upfile_obj2, $sessid, "tw2");
		$tmpfile3 = t_image_save2tmp($upfile_obj3, $sessid, "tw3");
		$tmpfile11 = t_image_save2tmp($upfile_obj11, $sessid, "tw11");
		$tmpfile12 = t_image_save2tmp($upfile_obj12, $sessid, "tw12");
		$tmpfile13 = t_image_save2tmp($upfile_obj13, $sessid, "tw13");

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$topic_write['target_c_commu_topic_id'] = $c_commu_topic_id;
		$topic_write['body'] = $body;
		$topic_write['image_filename1_tmpfile']=$tmpfile1;
		$topic_write['image_filename2_tmpfile']=$tmpfile2;
		$topic_write['image_filename3_tmpfile']=$tmpfile3;
		$topic_write['file_filename1_tmpfile']=$tmpfile11;
		$topic_write['file_filename2_tmpfile']=$tmpfile12;
		$topic_write['file_filename3_tmpfile']=$tmpfile13;
		$topic_write['image_filename1']=$upfile_obj1["name"];
		$topic_write['image_filename2']=$upfile_obj2["name"];
		$topic_write['image_filename3']=$upfile_obj3["name"];
		$topic_write['file_filename1']=$upfile_obj11["name"];
		$topic_write['file_filename2']=$upfile_obj12["name"];
		$topic_write['file_filename3']=$upfile_obj13["name"];
		$topic_write['image_position']=$image_position;

		$smarty->assign('topic_write', $topic_write);
		$smarty->ext_display("c_topic_write_confirm.tpl");
}

