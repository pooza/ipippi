<?php

//---------------------------------------------------------------------------
function pageAction_fh_delete_comment($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_diary_id = $requests['target_c_diary_id'];
	$target_c_diary_comment_id = $requests['target_c_diary_comment_id'];
	// ----------

    // target �����ꤵ��Ƥ��ʤ�
    if (!$target_c_diary_id) {
        client_redirect("page.php?p=h_err_fh_diary");
        exit;
    }
    // target ��������¸�ߤ��ʤ�
    if (!p_common_is_active_c_diary_id($target_c_diary_id)) {
        client_redirect("page.php?p=h_err_fh_diary");
        exit;
    }
    
    $target_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
	
    // ������륳���Ȥ������ꤵ��Ƥ��ʤ�
    if (!$target_c_diary_comment_id) {
        client_redirect("page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id");
        exit;
    }
    // ������ID������
    foreach ($target_c_diary_comment_id as $item) {
    	$comment = _do_c_diary_comment4c_diary_comment_id($item);
    	if ($comment['c_diary_id'] != $target_c_diary_id
    		|| ($comment['c_member_id'] != $u &&
    			$target_diary['c_member_id'] != $u) ) {
    		client_redirect("page.php?p=fh_diary&target_c_diary_id=$target_c_diary_id");
    		exit;
    	}
    }

	// ���֥������Ȥο���ʬ����
	$target_c_member_id = $target_diary['c_member_id']; 

	// inc_navi.tpl
	if(!$target_c_member_id){
		$target_c_member_id = $u;
		$type = "h";
		$is_diary_admin = true;
	} elseif($target_c_member_id == $u) {
		$type = "h";
		$is_diary_admin = true;
	} else {
		$type = "f";
		$is_diary_admin = false;
	}

	$smarty->assign('inc_navi',fetch_inc_navi($type,$target_c_member_id));
	$smarty->assign('is_diary_admin', $is_diary_admin);

	$smarty->assign("member", db_common_c_member4c_member_id($u));
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));
	$smarty->assign("target_diary", $target_diary);

	//������륳���Ȱ���
	$smarty->assign("target_diary_comment_list", p_fh_diary_c_diary_comment_list4c_diary_comment_id($target_c_diary_comment_id));

	//$smarty->assign("body", $body);
	//������륳����ID
	$smarty->assign("target_c_diary_comment_id", $target_c_diary_comment_id);

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("fh_delete_comment.tpl");
}
?>
