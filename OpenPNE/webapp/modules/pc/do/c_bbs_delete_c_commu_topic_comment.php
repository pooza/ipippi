<?php
//---------------------------------------------------------------------------
/**
コメント削除

[引数]
target_c_commu_topic_comment_id

[リダイレクト]
c_bbs

[リダイレクト引数]
target_c_commu_topic_id

[権限]
コミュニティ管理者
コミュニティメンバー

*/
function doAction_c_bbs_delete_c_commu_topic_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_commu_topic_comment_id = $request['target_c_commu_topic_comment_id'];

	//--- 権限チェック
	//コミュニティ管理者 or コミュニティ参加者

	$c_commu_topic_comment = do_c_bbs_c_commu_topic_comment4c_commu_topic_comment_id($target_c_commu_topic_comment_id);
    
    $c_commu_topic = _do_c_bbs_c_commu_topic4c_commu_topic_id($c_commu_topic_comment['c_commu_topic_id']);
    $c_commu_id = $c_commu_topic['c_commu_id'];
    
    $status = db_common_commu_status($u, $c_commu_id);
    if ($c_commu_topic_comment['number']=="0") {
    	handle_kengen_error();
    }
    if (!$status['is_commu_admin']
        && $c_commu_topic_comment['c_member_id'] != $u) {
        handle_kengen_error();
    }
    //---
    

	do_c_bbs_delete_c_commu_topic_comment($target_c_commu_topic_comment_id);

	if($c_commu_topic['event_flag']){
		client_redirect('page.php?p=c_event_detail&target_c_commu_topic_id='.$c_commu_topic_comment['c_commu_topic_id']);
	}else{
		client_redirect('page.php?p=c_topic_detail&target_c_commu_topic_id='.$c_commu_topic_comment['c_commu_topic_id']);
	}
}

