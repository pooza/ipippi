<?php
function doAction_c_event_edit_delete_c_commu_topic_comment_image($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_topic_id = $request['target_c_commu_topic_id'];
	$pic_delete = $request['pic_delete'];
	// ----------

	$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);

	//--- 権限チェック
	//イベントの管理者 or コミュニティ管理者
	
	if (!_db_is_c_event_admin($c_commu_topic_id,$u) &&
		!_db_is_c_commu_admin($c_topic['c_commu_id'], $u)){
		handle_kengen_error();
		exit();
	}
	//---


	image_data_delete($c_topic['image_filename'.$pic_delete]);

	do_c_event_edit_delete_c_commu_topic_comment_image($c_commu_topic_id,$pic_delete);

	client_redirect("page.php?p=c_event_edit&target_c_commu_topic_id=".$c_commu_topic_id);
}

