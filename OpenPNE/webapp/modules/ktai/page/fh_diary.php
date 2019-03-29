<?php
function pageAction_fh_diary($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- �ꥯ�������ѿ�
	$target_c_diary_id = $requests['target_c_diary_id'];
	// ----------	

	$target_c_member = k_p_fh_diary_c_member4c_diary_id($target_c_diary_id);
	$target_c_member_id = $target_c_member['c_member_id'];

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&ksid=" . session_id());
		exit;
	}
	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);
	// �ե��ɤˤ����������Ƥ��ʤ�
    if ($target_c_member['public_flag_diary'] == "friend" &&
		!_db_is_friend($u, $target_c_member_id) &&
		$target_c_member_id != $u) {
        
        exit("���������˥��������Ǥ��ޤ���");
    }

    //��������HTML
    $smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('k_fh_diary'));
	
	//�����κ�Ծ���
	$smarty->assign("target_diary_writer", $target_c_member);
	
	//����
	$c_diary = k_p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
	$smarty->assign("target_c_diary", $c_diary);
	//��ʬ�������򸫤��Ȥ�
    if($c_diary['c_member_id'] == $u){
		//����������Ѥߤˤ���
		p_h_diary_update_c_diary_is_checked4c_dirary_id( $target_c_diary_id, "1");
	}
	//������
	$c_diary_comment_list = k_p_fh_diary_c_diary_comment_list4c_diary_id($target_c_diary_id);
/*
	//����ȿ��
	foreach ($c_diary_comment_list as $key => $value){
		$c_diary_comment_list[$key]['body'] = nl2br($value['body']);
	}
*/
	$smarty->assign("c_diary_comment", $c_diary_comment_list);
	
	// f or h
	$smarty->assign("INC_NAVI_type", k_p_fh_common_get_type($target_c_member['c_member_id'], $u));
	
	//�������Ȥ�Ĥ���
	k_p_etc_do_ashiato($target_c_member_id, $u);	
	
	$smarty->ext_display("fh_diary.tpl");
}

?>