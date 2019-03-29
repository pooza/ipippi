<?php
function pageAction_h_com_find_result($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$search_word = $requests['search_word'];
	$target_c_commu_category_id = $requests['target_c_commu_category_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

	//search log
	do_common_insert_search_log($u, $search_word);

	$page_size = 10;
	$page += $direc;

	//ページ
	$smarty->assign("page", $page);

	//search_word
	$smarty->assign("search_word", $search_word);
	$smarty->assign("search_word_encode", urlencode($search_word));

	//検索に用いたカテゴリ
	$smarty->assign("target_c_commu_category_id" , $target_c_commu_category_id);

	//カテゴリのリスト
	$smarty->assign("c_commu_category_list", _db_c_commu_category4null());

	//検索結果
	$list = k_p_h_com_category_c_commu_list4c_commu_category_id_search($target_c_commu_category_id, $page_size, $page, $search_word);

	$smarty->assign("c_commu_search_result", $list[0]);
	$smarty->assign("count_total", $list[3]);
	$smarty->assign("is_prev", $list[1]);
	$smarty->assign("is_next", $list[2]);

	$smarty->ext_display("h_com_find_result.tpl");

}

