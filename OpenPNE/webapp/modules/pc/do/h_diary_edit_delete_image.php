<?php
function doAction_h_diary_edit_delete_image($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$c_diary_id = $request['target_c_diary_id'];
	$del_img = $request['del_img'];
	// ----------

	//--- ���¥����å�
	//����������

    $c_diary = p_fh_diary_c_diary4c_diary_id($c_diary_id);
	//������񤤤��ͤǤʤ��Ⱦä��ʤ�
	if($c_diary['c_member_id'] != $u){
		client_redirect("page.php?p=h_home");
	}	
	//---

		
	image_data_delete($c_diary['image_filename_'. $del_img]);
	do_c_diary_edit_delete_c_diary_image($c_diary_id, $del_img);

	client_redirect("page.php?p=h_diary_edit&target_c_diary_id=".$c_diary_id);
}
?>
