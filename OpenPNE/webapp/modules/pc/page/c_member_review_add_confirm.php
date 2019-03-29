<?php

function pageAction_c_member_review_add_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		// ----------

		// --- リクエスト変数
		$c_commu_id = $requests['target_c_commu_id'];
		$c_review_id = $requests['c_review_id'];
		// ----------

		//--- 権限チェック
		//コミュニティメンバ
		if(!_db_is_c_commu_member($c_commu_id, $u)){
			handle_kengen_error();
		}
		//---

		if(!$c_review_id){
			$_REQUEST['target_c_commu_id'] = $c_commu_id;
			module_execute('pc', 'page', "c_member_review_add");
			exit();
		}

		$c_member_review = c_member_review_add_confirm_c_member_review4c_review_id($c_review_id, $u);
		$smarty->assign('c_member_review', $c_member_review);

		$smarty->assign('c_commu', p_common_c_commu4c_commu_id($c_commu_id));
		$smarty->assign('c_review_id', $c_review_id);

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$smarty->ext_display('c_member_review_add_confirm.tpl');
}

