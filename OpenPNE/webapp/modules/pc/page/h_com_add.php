<?php



//---------------------------------------------------------------------------
function pageAction_h_com_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- �ꥯ�������ѿ�
		$name = $requests['name'];
		$c_commu_category_id = $requests['c_commu_category_id'];
		$info = $requests['info'];
		$public_flag = $requests['public_flag'];
		$err_msg = $requests['err_msg'];
		// ----------


	  $form_val=array(
		'name'=>$name,
		'c_commu_category_id'=>$c_commu_category_id,
		'info'=>$info,
		'public_flag'=>$public_flag,
		);
	  
	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign("c_commu_category", p_h_com_add_c_commu_category4null());

	$c_commu_category_list = p_h_com_add_c_commu_category4null();
	$public_flag_list=
	array(
		'public' =>'���á�ï�Ǥ⻲�ò�ǽ���Ǽ��ġ������˸���',
		'auth_sns' =>'���á������Ԥξ�ǧ��ɬ�ס��Ǽ��ġ������˸���',
		'auth_commu_member' =>'���á������Ԥξ�ǧ��ɬ�ס��Ǽ��ġ����ߥ�˥ƥ����üԤˤΤ߸���',
	);

	$smarty->assign("c_commu_category_list", $c_commu_category_list);
	$smarty->assign("public_flag_list", $public_flag_list);
	$smarty->assign("form_val", $form_val);

	$smarty->assign('err_msg', $err_msg);

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("h_com_add.tpl");
}
?>
