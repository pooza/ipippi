<?php

function pageAction_c_topic_add($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$c_commu_id = $requests['target_c_commu_id'];
	$title = $requests['title'];
	$body = $requests['body'];
	$event_flag = $requests['event_flag'];
	$err_msg = $requests['err_msg'];
	// ----------

	if($event_flag==1){
	    client_redirect("page.php?p=c_event_add&target_c_commu_id=".$c_commu_id);
	}

	//--- ���¥����å�
	//���ߥ�˥ƥ����С�
	if(!p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id,$u)){
		$_REQUEST['target_c_commu_id'] = $c_commu_id;
		$_REQUEST['msg'] = "�ȥԥå������򤪤��ʤ��ˤϥ��ߥ�˥ƥ��˻��ä���ɬ�פ�����ޤ�";
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
?>
