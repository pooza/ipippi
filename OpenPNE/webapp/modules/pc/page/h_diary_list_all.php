<?php
	//shou050623
//---------------------------------------------------------------------------
function pageAction_h_diary_list_all($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$direc = $requests['direc'];
	$page = $requests['page'];
	$keyword = $requests['keyword'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	//��������
	$page = $page + $direc;
	$page_size = 20;
	
	//�������
	$result = p_h_diary_list_all_search_c_diary4c_diary($keyword, $page_size, $page);
	
	//$smarty->assign('c_commu_search_list', test());
	$smarty->assign('new_diary_list', $result[0]);
	$smarty->assign('is_prev', $result[1]);
	$smarty->assign('is_next', $result[2]);
	//�����˰��פ������ߥ�˥ƥ���
	$smarty->assign('c_diary_search_list_count',$result[3]);

	$pager = array();
	$pager['start'] = $page_size * ($page - 1) + 1;
	if (($pager['end'] = $page_size * $page) > $result[3]) {
		$pager['end'] = $result[3];
	}
	$smarty->assign('page', $page);
	$smarty->assign('pager', $pager);

	$keyword = mb_convert_encoding($keyword, "EUC-JP", "EUC-JP,SJIS,UTF-8,JIS");
	//�Х�����Τ���Ⱦ�Ѷ�������Ѥ�����
	$keyword = str_replace ( " ", "��", $keyword);

	$search_val_list = array('val_order'=> null, // $val_order,
                             'search_word'=> null, // $search_word,
                             'category_id'=> null, // $category_id,
                             'c_commu_search_list_count'=>$result[3]);

	$smarty->assign('keyword',$keyword);

	if (!$keyword) {
		// rss_cache
		$limit = 20;
		$smarty->assign('c_rss_cache_list', p_h_diary_list_all_c_rss_cache_list($limit));
	}

	//---- �ڡ���ɽ�� ----//
	$smarty->ext_display("h_diary_list_all.tpl");
}
?>
