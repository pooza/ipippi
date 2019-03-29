<?php
function pageAction_c_bbs($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- リクエスト変数
	$target_c_commu_topic_id = $requests['target_c_commu_topic_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ---------- 

	$page_size = 5;
	$page += $direc;
	
	//ページ
	$smarty->assign("page", $page);
	
	//トピックのコメントリスト
	$list = k_p_c_bbs_c_commu_topic_comment_list4c_c_commu_topic_id($target_c_commu_topic_id, $u, $page_size, $page);
	$smarty->assign("c_commu_topic_comment_list", $list[0]);
	$smarty->assign("is_prev", $list[1]);
	$smarty->assign("is_next", $list[2]);
	
	//トピック名
	$smarty->assign("c_commu_topic_name", k_p_c_bbs_c_commu_topic_name4c_commu_topic_id($target_c_commu_topic_id));
	//トピックID,トピック
	$smarty->assign("c_commu_topic_id", $target_c_commu_topic_id);
	$smarty->assign("c_commu_topic", 	c_event_detail_c_topic4c_commu_topic_id($target_c_commu_topic_id));
	
	//コミュニティ
    $c_commu = k_p_c_bbs_c_commu4c_commu_topic_id($target_c_commu_topic_id);
	$smarty->assign("c_commu", $c_commu);
    
	//--- 権限チェック
    //掲示板の閲覧権限	tplでやっている
    $smarty->assign("is_c_commu_view", p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu['c_commu_id'], $u));
    $smarty->assign("is_c_commu_member", p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu['c_commu_id'], $u));
    $smarty->assign("is_c_event_member", p_common_is_c_event_member4c_commu_topic_idAc_member_id($target_c_commu_topic_id,$u));
	$smarty->assign("is_c_event_admin", p_common_is_c_event_admin4c_commu_topic_idAc_member_id($target_c_commu_topic_id,$u));
    

	//ユーザーがコミュニティ管理者かどうか
	$smarty->assign("is_admin", k_p_c_bbs_is_admin4c_member_id_c_commu_topic_id($u, $target_c_commu_topic_id));
	//コミュニティ管理者
	$smarty->assign("c_member_admin", k_p_c_bbs_c_member_admin4c_commu_topic_id($target_c_commu_topic_id));
	
	if (defined('MAIL_ADDRESS_HASHED') && MAIL_ADDRESS_HASHED) {
		$mail_address = "t{$target_c_commu_topic_id}-".t_get_user_hash($u)."@".MAIL_SERVER_DOMAIN;
	} else {
		$mail_address = "t{$target_c_commu_topic_id}"."@".MAIL_SERVER_DOMAIN;
	}
    $smarty->assign("mail_address", $mail_address);
    
	$smarty->ext_display("c_bbs.tpl");
}

