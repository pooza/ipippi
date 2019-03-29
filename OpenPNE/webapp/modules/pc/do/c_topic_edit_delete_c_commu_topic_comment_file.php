<?php
function doAction_c_topic_edit_delete_c_commu_topic_comment_file($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_topic_id = $request['c_commu_topic_id'];
	$file_index = $request['file_index'];
	// ----------

	$c_topic = c_topic_detail_c_topic4c_commu_topic_id($c_commu_topic_id);

	//--- 権限チェック
	//トピック作成者 or コミュニティ管理者
	if(!_db_is_c_topic_admin($c_commu_topic_id,$u) &&
		!_db_is_c_commu_admin($c_topic['c_commu_id'], $u)){
		handle_kengen_error();
		exit();
	}
	//---

	do_c_event_edit_delete_c_commu_topic_comment_file($c_commu_topic_id,$file_index);

	client_redirect("page.php?p=c_topic_edit&target_c_commu_topic_id=".$c_commu_topic_id);
}

