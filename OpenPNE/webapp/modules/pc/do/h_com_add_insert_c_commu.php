<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ�����

[����]
name
c_commu_category_id
info
public_flag

[������쥯��]
c_home

[������쥯�Ȱ���]
target_c_commu_id

[����]
���桼����

*/
function doAction_h_com_add_insert_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$name = $request['name'];
	$c_commu_category_id = $request['c_commu_category_id'];
	$info = $request['info'];
	$public_flag = $request['public_flag'];
	$tmpfile = $request['tmpfile'];
	// ----------

	//--- ���¥����å�
	//TODO:�������ƥ���ϥ���Ȥ���

	//---

	$c_member_id = $u;

	$filename="";
	if($tmpfile){
		 $filename = image_insert_c_image4tmp("c_".$c_commu_category_id, $tmpfile);
	}
	t_image_clear_tmp(session_id());

	$c_commu_id = do_h_com_add_insert_c_commu($c_member_id,$name,$c_commu_category_id,$info,$public_flag, $filename);

	//�����Ԥ򥳥ߥ���С��ˤ��롣
	do_inc_join_c_commu($c_commu_id,$c_member_id);

	client_redirect('page.php?p=c_home&target_c_commu_id='.$c_commu_id);

}
?>
