<?php

function pageAction_c_event_detail($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_topic_id = $requests['target_c_commu_topic_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	$all = $requests['all'];
	$err_msg = $requests['err_msg'];
	$body = $requests['body'];
	// ----------

	$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
	$c_commu_id = $c_topic['c_commu_id'];

	//--- 権限チェック
	if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$u)){
        handle_kengen_error();
	}
	//---

    $c_commu = p_common_c_commu4c_commu_id($c_commu_id);
    if (!$c_commu) {
        client_redirect("page.php?p=h_err_c_home");
        exit;
    }
	if (!$c_topic['event_flag']) {
        client_redirect("page.php?p=c_topic_detail&target_c_commu_topic_id=".$c_topic['c_commu_topic_id']);
        exit;
    }

	$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));

	//詳細部分	
	$smarty->assign("c_commu",$c_commu);
	$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
	$c_topic['file_filename1_url'] = urlencode($c_topic['file_filename1']);
	$c_topic['file_filename2_url'] = urlencode($c_topic['file_filename2']);
	$c_topic['file_filename3_url'] = urlencode($c_topic['file_filename3']);
	$smarty->assign("c_topic",$c_topic);

	//書き込み一覧部分
	$page += $direc;
	if ($all==1) $page_size = 1000;
	else $page_size = 10;

	$lst = c_event_detail_c_topic_write4c_commu_topic_id($c_commu_topic_id,$page,$page_size);
	$c_topic_write = $lst[0];
	foreach ($c_topic_write as $key => $item) {
		$c_topic_write[$key]['file_filename1_url'] = urlencode($item['file_filename1']);
		$c_topic_write[$key]['file_filename2_url'] = urlencode($item['file_filename2']);
		$c_topic_write[$key]['file_filename3_url'] = urlencode($item['file_filename3']);
	}
	$smarty->assign("c_topic_write",$c_topic_write);
	$smarty->assign("is_prev",$lst[1]);
	$smarty->assign("is_next",$lst[2]);
	$smarty->assign("total_num",$lst[3]);
	$smarty->assign("page",$page);
	$smarty->assign("all",$all);

	$smarty->assign("start_num", $lst[4]);
	$smarty->assign("end_num", $lst[5]);

	$smarty->assign("is_c_commu_admin", p_common_is_c_commu_admin4c_member_id($c_commu_id,$u));
	$smarty->assign("is_c_commu_member", p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id,$u));
	$smarty->assign("is_c_event_member", p_common_is_c_event_member4c_commu_topic_idAc_member_id($c_commu_topic_id,$u));
	$smarty->assign("is_c_event_admin", p_common_is_c_event_admin4c_commu_topic_idAc_member_id($c_commu_topic_id,$u));

	$smarty->assign('err_msg', $err_msg);
	$smarty->assign('body', $body);

	$smarty->assign('c_member_id', $u);	

	$smarty->ext_display('c_event_detail.tpl');
}
?>
