<?php

//---------------------------------------------------------------------------
function pageAction_h_com_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
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
		'public' =>'参加：誰でも参加可能、掲示板：全員に公開',
		'auth_sns' =>'参加：管理者の承認が必要、掲示板：全員に公開',
		'auth_commu_member' =>'参加：管理者の承認が必要、掲示板：コミュニティ参加者にのみ公開',
	);

	$smarty->assign("c_commu_category_list", $c_commu_category_list);
	$smarty->assign("public_flag_list", $public_flag_list);
	$smarty->assign("form_val", $form_val);

	$smarty->assign('err_msg', $err_msg);

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("h_com_add.tpl");
}

