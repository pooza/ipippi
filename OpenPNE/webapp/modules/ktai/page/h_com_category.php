<?php
function pageAction_h_com_category($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- リクエスト変数
	$target_c_commu_category_id = $requests['target_c_commu_category_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	$search_word = $requests['search_word'];
	// ----------
	
	$page_size = 10;
	$page += $direc;
	
	//ページ
	$smarty->assign("page", $page);
    
    $smarty->assign("search_word", $search_word);
    $smarty->assign("search_word_encode", urlencode($search_word));
	
	//カテゴリ内のコミュニティリスト
//	$list= k_p_h_com_category_c_commu_list4c_commu_category_id($target_c_commu_category_id ,$page_size, $page);
//	$smarty->assign("c_commu_list", $list[0]);
//	$smarty->assign("is_prev", $list[1]);
//	$smarty->assign("is_next", $list[2]);
    $list= k_p_h_com_category_c_commu_list4c_commu_category_id_search($target_c_commu_category_id ,$page_size, $page, $search_word);
    $smarty->assign("c_commu_list", $list[0]);
    $smarty->assign("is_prev", $list[1]);
    $smarty->assign("is_next", $list[2]);
    $smarty->assign("count_total", $list[3]);    
	
	//カテゴリ名
	$smarty->assign("c_commu_category_name", k_p_h_com_category_c_commu_category_name4c_commu_category_id($target_c_commu_category_id));
	//カテゴリID
	$smarty->assign("c_commu_category_id", $target_c_commu_category_id);
	
	//parent
	$smarty->assign("c_commu_category_parent_id", k_p_h_com_category_c_commu_category_parent_id4c_commu_category_id($target_c_commu_category_id));
	
	$smarty->ext_display("h_com_category.tpl");
}

