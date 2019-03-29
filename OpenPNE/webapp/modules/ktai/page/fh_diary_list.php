<?php
function pageAction_fh_diary_list($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- �ꥯ�������ѿ�
	$target_c_member_id = $requests['target_c_member_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------
	
	if(!$target_c_member_id) $target_c_member_id = $u;
	
	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&ksid=" . session_id());
		exit;
	}
	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);
	// �ե��ɤˤ����������Ƥ��ʤ�
    if ($target_c_member['public_flag_diary'] == "friend" &&
		!_db_is_friend($u,$target_c_member_id) &&
		$target_c_member_id != $u) {
        
        exit("���������˥��������Ǥ��ޤ���");
    }

	//�������åȾ���
	$smarty->assign("target_c_member", k_p_fh_diary_list_c_member4c_member_id($target_c_member_id));

	// 1�ڡ����������ɽ�����������ο�
	$page_size = 10;
	$page += $direc;
	//�������åȤξܺ٤������ꥹ��
	$list = k_p_fh_diary_list_c_diary_list4c_member_id($target_c_member_id,$page_size,$page);

	$smarty->assign("target_diary_list", $list[0]);
	$smarty->assign("page",$page);
	$smarty->assign("is_prev",$list[1]);
	$smarty->assign("is_next",$list[2]);
	
	//f or h
	$smarty->assign("INC_NAVI_type", k_p_fh_common_get_type($target_c_member_id, $u));

	//�������Ȥ�Ĥ���
	k_p_etc_do_ashiato($target_c_member_id, $u);
	
	$smarty->ext_display("fh_diary_list.tpl");
}

?>