<?php

//---------------------------------------------------------------------------
function pageAction_h_com_add_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- �ꥯ�������ѿ�
		$name = $requests['name'];
		$c_commu_category_id = $requests['c_commu_category_id'];
		$info = $requests['info'];
		$public_flag = $requests['public_flag'];
		// ----------
		$upfile_obj = $_FILES['image_filename'];

	//TODO:
		$err_msg = array();
		if (p_c_com_add_is_commu4c_commu_name($name))
			$err_msg[] = "���Υ��ߥ�˥ƥ��Ϥ��Ǥ�¸�ߤ��ޤ�";

	    if($upfile_obj["tmp_name"] && (t_get_image_size($upfile_obj) > 300*1024 || !t_check_image_format($upfile_obj)))
	    	$err_msg[] = "����1�Υ�������300KB�����GIF��JPEG��PNG�ˤ��Ƥ�������";


		if($err_msg){
			$_REQUEST['err_msg'] = $err_msg;
			module_execute('pc', 'page', "h_com_add");
			exit;
		}
	//-----	

		$smarty->assign('inc_navi',fetch_inc_navi("h"));

		$c_commu_category_list = p_c_edit_c_commu_category_list4null();

		$public_flag_list=
		array(
			'public' =>'���á�ï�Ǥ⻲�ò�ǽ���Ǽ��ġ������˸���',
			'auth_sns' =>'���á������Ԥξ�ǧ��ɬ�ס��Ǽ��ġ������˸���',
			'auth_commu_member' =>'���á������Ԥξ�ǧ��ɬ�ס��Ǽ��ġ����ߥ�˥ƥ����üԤˤΤ߸���',
		);

		foreach($c_commu_category_list as $each_c_commu_categfory){
			if($each_c_commu_categfory['c_commu_category_id']==$c_commu_category_id)$c_commu_category_value=$each_c_commu_categfory['name'];
		}
		$public_flag_value=$public_flag_list[$public_flag];

		$smarty->assign("c_commu_category_value", $c_commu_category_value);
		$smarty->assign("public_flag_value", $public_flag_value);

		//������var/tmp�ե�����˥��ԡ�
		$sessid = session_id();
		t_image_clear_tmp($sessid);
		if( file_exists($upfile_obj["tmp_name"]) ) $tmpfile = t_image_save2tmp($upfile_obj, $sessid, "c");

		$form_val=array(
		'name'=>$name,
		'c_commu_category_id'=>$c_commu_category_id,
		'info'=>$info,
		'public_flag'=>$public_flag,
		'tmpfile'=>$tmpfile,
		'image_filename' => $upfile_obj['name']
		);

		$smarty->assign("form_val", $form_val);

		$smarty->ext_display("h_com_add_confirm.tpl");

}
?>
