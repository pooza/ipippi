<?php



//---------------------------------------------------------------------------
function pageAction_c_edit($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	$name = $requests['name'];
	$c_commu_category_id = $requests['c_commu_category_id'];
	$info = $requests['info'];
	$public_flag = $requests['public_flag'];
	$err_msg = $requests['err_msg'];
	// ----------

	//--- 権限チェック
	//コミュニティ管理者
	if (!_db_is_c_commu_admin($target_c_commu_id, $u)) {
	    handle_kengen_error();
	}
	//---

	$smarty->assign('inc_navi',fetch_inc_navi("c",$target_c_commu_id));

	//コミュニティデータ取得
	$c_commu = p_c_edit_c_commu4c_commu_id($target_c_commu_id);

	if($name)$c_commu['name']=$name;
	if($c_commu_category_id)$c_commu['c_commu_category_id']=$c_commu_category_id;
	if($info)$c_commu['info']=$info;
	if($public_flag)$c_commu['public_flag']=$public_flag;

	$smarty->assign("target_c_commu_id", $target_c_commu_id);

	if($err_msg){
		$c_commu['name'] = $name;
		$c_commu['info'] = $info;	
	}

	$smarty->assign("c_commu", $c_commu);

	$smarty->assign("c_commu_category_list", p_c_edit_c_commu_category_list4null());

	$public_flag_list=
	array(
		'public' =>'参加：誰でも参加可能、掲示板：全員に公開',
		'auth_sns' =>'参加：管理者の承認が必要、掲示板：全員に公開',
		'auth_commu_member' =>'参加：管理者の承認が必要、掲示板：コミュニティ参加者にのみ公開',
	);

	$smarty->assign("public_flag_list", $public_flag_list);

	$smarty->assign("is_topic", p_c_edit_is_topic4c_commu_id($target_c_commu_id));

	$smarty->assign("err_msg", $err_msg);


	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("c_edit.tpl");

}

