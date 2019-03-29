<?php

function pageAction_c_topic_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_id = $requests['target_c_commu_id'];
	$title = $requests['title'];
	$body = $requests['body'];
	$event_flag = $requests['event_flag'];
	$err_msg = $requests['err_msg'];
	// ----------

	if($event_flag==1){
	    client_redirect("page.php?p=c_event_add&target_c_commu_id=".$c_commu_id);
	}

	//--- 権限チェック
	//コミュニティメンバー
	if(!p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id,$u)){
		$_REQUEST['target_c_commu_id'] = $c_commu_id;
		$_REQUEST['msg'] = "トピック作成をおこなうにはコミュニティに参加する必要があります";
		module_execute('pc', 'page', "c_home");
		exit();
	}

	$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
	$smarty->assign("c_commu",p_c_home_c_commu4c_commu_id($c_commu_id));

	$smarty->assign('err_msg', $err_msg);

	$smarty->assign('title', $title);
	$smarty->assign('body', $body);
	$smarty->ext_display("c_topic_add.tpl");
}

