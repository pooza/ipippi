<?php
//----------------------------------------------------------------------------
/**
コメント書き込み

[引数]
target_c_commu_topic_id
body

[リダイレクト]
c_bbs

[リダイレクト引数]
target_c_commu_topic_id

[権限]
コミュニティメンバー

*/
function doAction_c_bbs_insert_c_commu_topic_comment($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_topic_id = $requests['target_c_commu_topic_id'];
	$body = $requests['body'];
	// ----------

	//--- 権限チェック
	//コミュニティ参加者

    $c_commu_topic = _do_c_bbs_c_commu_topic4c_commu_topic_id($target_c_commu_topic_id);
    $c_commu_id = $c_commu_topic['c_commu_id'];

    $status = db_common_commu_status($u, $c_commu_id);
    if (!$status['is_commu_member']) {
        handle_kengen_error();
    }
	//---

	if (is_null($body) || $body === '') {  //bodyが無い時のエラー処理
	    //msg=1 "本文を入力してください。"
    	client_redirect("ktai_page.php?p=c_bbs&target_c_commu_topic_id=$target_c_commu_topic_id&msg=1&$tail#comment");
    	exit();
	}

	$insert_id = do_c_bbs_insert_c_commu_topic_comment($u, $target_c_commu_topic_id, $body);
	
	//イベントのメンバーに追加
	if($requests['join_event']){
		do_c_event_add_insert_c_event_member($target_c_commu_topic_id, $u);
	}elseif($requests['cancel_event']){
		do_c_event_add_delete_c_event_member($target_c_commu_topic_id, $u);	
	}
	
	//お知らせメール送信(携帯へ)
	send_bbs_info_mail($insert_id, $u);  
	//お知らせメール送信(PCへ)
	send_bbs_info_mail_pc($insert_id, $u);  


	client_redirect("ktai_page.php?p=c_bbs&target_c_commu_topic_id=$target_c_commu_topic_id&$tail");
}

