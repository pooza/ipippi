<?php
function pageAction_h_zyunban0621($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$page = $requests['page'];
	$direc = $requests['direc'];
	$kind = $requests['kind'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('kind', $kind);


	$limit = 10;
	switch ($kind) {
	case "friend":
	    $list = p_h_ranking_c_friend_ranking($limit);
	    foreach ($list as $key => $value) {
	        $list[$key]['c_member'] = db_common_c_member_with_profile($value['c_member_id']);
	    }
	    break;
	case "com_member":
	    $list = p_h_ranking_c_commu_member_ranking($limit);
	    foreach ($list as $key => $value) {
	        $list[$key]['c_commu'] = p_common_c_commu4c_commu_id($value['c_commu_id']);
	    }
	    break;
	case "com_comment":
	    $list = p_h_ranking_c_commu_topic_comment_ranking($limit);
	    foreach ($list as $key => $value) {
	        $list[$key]['c_commu'] = p_common_c_commu4c_commu_id($value['c_commu_id']);
	    }
	    break;
	case "ashiato":
	default:
	    $list = p_h_ranking_c_ashiato_ranking($limit);
	    foreach ($list as $key => $value) {
	        $list[$key]['c_member'] = db_common_c_member_with_profile($value['c_member_id']);
	    }
	    break;
	}

	$rank_list = array();
	$rank = 1;
	$current_count = null;
	foreach($list as $item) {
	    if ($item['count'] != $current_count) {
	        $rank = $rank + count($rank_list[$rank]);
	        $current_count = $item['count'];
	    }
	    $rank_list[$rank][] = $item;
	}

	$smarty->assign("rank_list", $rank_list);

	$smarty->ext_display("h_zyunban0621.tpl");
}
?>
