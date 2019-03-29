<?php

function pageAction_f_bookmark_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_member_id = $requests['target_c_member_id'];
		// ----------

		if(p_common_is_access_block($u, $target_c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;

		}

		if ($target_c_member_id == $u) {
			exit("自分は追加できません。");
		}

		$smarty->assign('inc_navi',fetch_inc_navi("f", $target_c_member_id));
		$c_member = db_common_c_member_with_profile($target_c_member_id);
		$c_member['last_login'] = p_f_home_last_login4access_date($c_member['access_date']);
		$smarty->assign('c_member', $c_member);

		$smarty->ext_display("f_bookmark_add.tpl");
}

