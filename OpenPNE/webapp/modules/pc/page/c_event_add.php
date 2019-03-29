<?php

//---------------------------------------------------------------------------
function pageAction_c_event_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_id = $requests['target_c_commu_id'];
	$err_msg = $requests['err_msg'];
	// ----------

	//--- 権限チェック
	//コミュニティメンバー
	if(!p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id,$u)){

		$_REQUEST['target_c_commu_id'] = $c_commu_id;
		$_REQUEST['msg'] = "イベント作成をおこなうにはコミュニティに参加する必要があります";
		module_execute('pc', 'page', "c_home");
		exit();

	}
	//---

	$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));

	$smarty->assign("c_commu",p_c_home_c_commu4c_commu_id($c_commu_id));
	$smarty->assign("year", p_c_event_add_year4null());
	$smarty->assign('month', p_regist_prof_c_profile_month_list4null());
	$smarty->assign('day', p_regist_prof_c_profile_day_list4null());
	$smarty->assign('pref', p_regist_prof_c_profile_pref_list4null());
	$smarty->assign('msg', $_REQUEST['msg']);

	$smarty->assign('event', p_c_event_add_confirm_event4request());
	$smarty->assign('err_msg', $err_msg);
	$smarty->ext_display("c_event_add.tpl");
}

