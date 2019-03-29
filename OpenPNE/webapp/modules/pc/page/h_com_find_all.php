<?php


//---------------------------------------------------------------------------
function pageAction_h_com_find_all($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_category_parent_id = $requests['target_c_commu_category_parent_id'];
	$keyword = $requests['keyword'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	$val_order = $requests['val_order'];
	$category_id = $requests['category_id'];
	// ----------

	$keyword = mb_convert_encoding($keyword, "EUC-JP", "EUC-JP,SJIS,UTF-8,JIS");
	//バグ回避のため半角空白を全角に統一
	$keyword = str_replace(" ", "　", $keyword);

	do_common_insert_search_log($u, $keyword);

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$page_size = 20;
	$page = $page + $direc;
	$smarty->assign('page', $page);

	//検索結果
	list($result, $is_prev, $is_next, $total_num, $start_num, $end_num)
		= p_h_com_find_all_search_c_commu4c_commu_category(
			$keyword,
			$target_c_commu_category_parent_id,
			$page_size,
			$page,
			$val_order,
			$category_id);

	$smarty->assign('c_commu_search_list', $result);
	$smarty->assign('is_prev', $is_prev);
	$smarty->assign('is_next', $is_next);
	$smarty->assign('total_num', $total_num);
	$smarty->assign('start_num', $start_num);
	$smarty->assign('end_num', $end_num);

	$smarty->assign('keyword', $keyword);
	$search_val_list = array(
		'val_order' => $val_order,
		'category_id' => $category_id,
	);
	$smarty->assign('search_val_list',$search_val_list);

	$smarty->assign('c_commu_category_list', p_h_com_find_all_c_commu_category_list4null());
	$smarty->assign('c_commu_category_parent_list',_db_c_commu_category_parent_list4null());
	 
	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("h_com_find_all.tpl");
}

