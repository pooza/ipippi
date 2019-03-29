<?php



//---------------------------------------------------------------------------
function pageAction_fh_intro($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $requests['target_c_member_id'];
	// ----------

	if (is_null($target_c_member_id)) {
		$target_c_member_id = $u;
	}

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("page.php?p=h_access_block");
		exit;
	}

	// navi ����ʬ����	
	if($target_c_member_id == $u) {
		$type = "h";
	} else {
		$type = "f";
	}
	$smarty->assign('inc_navi',fetch_inc_navi($type, $target_c_member_id));

	//��ʬ����
	$smarty->assign("member", db_common_c_member4c_member_id($u));

	//�������åȾ���
	$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

	if ($target_c_member_id == $u) {
		$raw_c_friend_comment_list = p_fh_intro_intro_list_with_my_intro4c_member_id($target_c_member_id);
	} else {
		$raw_c_friend_comment_list=p_fh_intro_intro_list4c_member_id($target_c_member_id);
	}
	$c_friend_comment_list = $raw_c_friend_comment_list;

	//�Ҳ�ʸã
	$smarty->assign("intro_list", $c_friend_comment_list);

	//---- �ڡ���ɽ�� ----//
	$smarty->ext_display("fh_intro.tpl");
}
?>
