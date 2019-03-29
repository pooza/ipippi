<?php
function pageAction_h_friend_find_all($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$nickname = $requests['nickname'];
	$birth_year = $requests['birth_year'];
	$birth_month = $requests['birth_month'];
	$birth_day = $requests['birth_day'];
	$page = $requests['page'];
	// ----------

	$profiles = array();
	if ($_REQUEST['profile']) {
		$profiles = p_h_search_result_check_profile($_REQUEST['profile']);
	}
	$smarty->assign('profiles', $profiles);

	$limit = 20;
	$smarty->assign("page", $page);

	//検索デフォルト値表示用
	$cond = array(
		'birth_year' => $birth_year,
		'birth_month' => $birth_month,
		'birth_day' => $birth_day,
	);
	$cond_like = array(
		'nickname' => $nickname,
	);
	$smarty->assign("cond", array_merge($cond, $cond_like));

	$result = p_h_search_result_search($cond, $cond_like, $limit, $page, $u, $profiles);
	$smarty->assign("target_friend_list", $result[0]);
	$pager = array(
		"page_prev" => $result[1],
		"page_next" => $result[2],
		"total_num" => $result[3],
	);

	$pager["disp_start"] = $limit * ($page - 1) + 1;
	if (($disp_end  = $limit * $page) > $pager['total_num']) {
		$pager['disp_end'] = $pager['total_num'];
	} else {
		$pager['disp_end'] = $disp_end;
	}

	$smarty->assign("pager", $pager);

	$tmp = array();
	foreach ($cond as $key => $value) {
		if ($value) {
			$tmp[] = "$key=".urlencode($value);
		}
	}
	foreach ($cond_like as $key => $value) {
		if ($value) {
			$tmp[] = "$key=".urlencode($value);
		}
	}
	foreach ($profiles as $key => $value) {
		if ($value['c_profile_option_id']) {
			$v = $value['c_profile_option_id'];
		} else {
			$v = urlencode($value['value']);
		}
		$tmp[] = urlencode("profile[{$key}]")."={$v}";
	}
	$search_condition = implode("&", $tmp);
	$smarty->assign("search_condition", $search_condition);

	$smarty->assign('profile_list', db_common_c_profile_list());
	$smarty->ext_display("h_friend_find_all.tpl");
}

