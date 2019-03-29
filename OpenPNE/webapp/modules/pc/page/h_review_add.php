<?php


function pageAction_h_review_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- �ꥯ�������ѿ�
		$keyword = $requests['keyword'];
		$category_id = $requests['category_id'];
		$page = $requests['page'];
		$search_flag = $requests['search_flag'];
		// ----------
		$page_size=10;//���Ѥ��Ƥ���PEAR�Υ⥸�塼��ǤϤ�����(10)���ѹ��Ǥ��ʤ�

		$smarty->assign('inc_navi',fetch_inc_navi("h"));
		$smarty->assign('category_disp',p_h_review_add_category_disp());
		$smarty->assign('category_id', $category_id);
		$smarty->assign('keyword', $keyword);

		if($search_flag && (empty($keyword) || empty($category_id))){
			 if(empty($keyword)) $err_msg[] = "������ɤ����Ϥ��Ʋ�����";
			 if(empty($category_id)) $err_msg[] = "���ƥ�������򤷤Ʋ�����";
		}elseif(!$search_flag){
		}
		else{
			list($search_result, $page, $pages) 
				= p_h_review_add_search_result($keyword,$category_id,$page);
		}

		$smarty->assign('search_result', $search_result);	
		$smarty->assign('page', $page);
		$smarty->assign('is_prev', ($page!=1 && !empty($pages) ? 1 : 0));
		$smarty->assign('is_next', ($page!=$pages && isset($pages) ? 1 : 0));
		$smarty->assign('err_msg', $err_msg);

		$start_num = ($page - 1) * $page_size + 1 ;
		if ($page_size > count($search_result)) {
			$total_num = $end_num = ($page-1)*$page_size + count($search_result);
		} else {
			$end_num = ($page - 1) * $page_size + $page_size ;
			$total_num = "��" . $page_size * $pages;
		}

		$smarty->assign('total_num', $total_num);
		$smarty->assign('start_num', $start_num);
		$smarty->assign('end_num', $end_num);

		$smarty->ext_display('h_review_add.tpl');
}
?>
