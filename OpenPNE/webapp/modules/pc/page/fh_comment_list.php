<?php

function pageAction_fh_comment_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------
	if (empty($target_c_member_id)) {
		$target_c_member_id = $u;
	}
	
	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);
	$smarty->assign("target_member", $target_c_member);
	
	if ($target_c_member_id == $u) {
		$type = "h";
	} else {
		$type = "f";
		
		//�����θ����ϰ�����
		if (($target_c_member['public_flag_diary'] == "friend" &&
			 !_db_is_friend($u, $target_c_member_id))) {
		    client_redirect("page.php?p=h_err_diary_access");
		    exit;
		}
	
		// ���������֥�å�
		if(p_common_is_access_block($u, $target_c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;
		}
	}
	$smarty->assign('inc_navi',fetch_inc_navi($type, $target_c_member_id));
	
	//c_member_id ���鼫ʬ�������ˤĤ��Ƥ륳����ID�ꥹ�Ȥ����
	$target_c_diary_comment_id = p_fh_diary_c_diary_comment_id_list4c_member_id($target_c_member_id);

	//�Ƕ�Υ����Ȱ���������(50�Ĥޤ�)
	$smarty->assign("new_comment_list", p_fh_diary_c_diary_comment_list4c_diary_comment_id($target_c_diary_comment_id,50));

	$smarty->ext_display('fh_comment_list.tpl');
}
?>
