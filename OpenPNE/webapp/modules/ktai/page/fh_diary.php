<?php
function pageAction_fh_diary($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- リクエスト変数
	$target_c_diary_id = $requests['target_c_diary_id'];
	// ----------	

	$target_c_member = k_p_fh_diary_c_member4c_diary_id($target_c_diary_id);
	$target_c_member_id = $target_c_member['c_member_id'];

	if(p_common_is_access_block($u, $target_c_member_id)){
		client_redirect("ktai_page.php?p=h_access_block&ksid=" . session_id());
		exit;
	}
	$target_c_member = db_common_c_member4c_member_id($target_c_member_id);
	// フレンドにしか公開していない
    if ($target_c_member['public_flag_diary'] == "friend" &&
		!_db_is_friend($u, $target_c_member_id) &&
		$target_c_member_id != $u) {
        
        exit("この日記にアクセスできません。");
    }

    //管理画面HTML
    $smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('k_fh_diary'));
	
	//日記の作者情報
	$smarty->assign("target_diary_writer", $target_c_member);
	
	//日記
	$c_diary = k_p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
	$smarty->assign("target_c_diary", $c_diary);
	//自分で日記を見たとき
    if($c_diary['c_member_id'] == $u){
		//日記を閲覧済みにする
		p_h_diary_update_c_diary_is_checked4c_dirary_id( $target_c_diary_id, "1");
	}
	//コメント
	$c_diary_comment_list = k_p_fh_diary_c_diary_comment_list4c_diary_id($target_c_diary_id);
/*
	//改行反映
	foreach ($c_diary_comment_list as $key => $value){
		$c_diary_comment_list[$key]['body'] = nl2br($value['body']);
	}
*/
	$smarty->assign("c_diary_comment", $c_diary_comment_list);
	
	// f or h
	$smarty->assign("INC_NAVI_type", k_p_fh_common_get_type($target_c_member['c_member_id'], $u));
	
	//あしあとをつける
	k_p_etc_do_ashiato($target_c_member_id, $u);	
	
	$smarty->ext_display("fh_diary.tpl");
}

?>