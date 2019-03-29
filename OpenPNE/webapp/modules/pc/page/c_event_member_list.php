<?php

function pageAction_c_event_member_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$c_commu_topic_id = $requests['target_c_commu_topic_id'];
		$page = $requests['page'];
		$direc = $requests['direc'];
		// ----------

		$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
		$c_commu_id = $c_topic['c_commu_id'];

		//--- 権限チェック
		if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$u)){
	        handle_kengen_error();
		}
		//---

		$smarty->assign('c_commu', p_common_c_commu4c_commu_id($c_commu_id));
		$smarty->assign('c_topic', $c_topic);

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$page+=$direc;
		$smarty->assign('page', $page);
		$page_size=50;
		$limit =(($page-1)*$page_size).",".$page_size;
		$c_event_membet_list=c_event_member_list4c_commu_topic_id($c_commu_topic_id,$limit);
		$total_c_event_membet=count_c_event_member_list4c_commu_topic_id($c_commu_topic_id);

		$start_num=($page-1)*$page_size+1;
		$end_num=($page)*$page_size;
		if($end_num>$total_c_event_membet)$end_num=$total_c_event_membet;

		$end_page=ceil($total_c_event_membet/$page_size);
		for($i=1;$i<=$end_page;$i++){
			$page_num[]=$i;
		}
		$smarty->assign("page_num",$page_num);

		$smarty->assign('c_event_member_list', $c_event_membet_list);	
		$smarty->assign('total_c_event_member', $total_c_event_membet);	

		$smarty->assign('is_prev', $start_num!=1);
		$smarty->assign('is_next', $end_num!=$total_c_event_membet);

		$smarty->assign('start_num', $start_num);
		$smarty->assign('end_num', $end_num);	
		$smarty->ext_display('c_event_member_list.tpl');	
}

