<?php
//---------------------------------------------------------------------------
/**
コミュニティトピック削除

[引数]
target_c_commu_topic_id

[リダイレクト]
c_home

[リダイレクト引数]
target_c_commu_id

[権限]
コミュニティ管理者
コミュニティトピック管理者

*/
function doAction_c_bbs_delete_c_commu_topic($request) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_commu_topic_id = $request['target_c_commu_topic_id'];

	//--- 権限チェック
	//コミュニティ管理者 or トピック作成者

	$c_commu_topic = _do_c_bbs_c_commu_topic4c_commu_topic_id($target_c_commu_topic_id);

	$c_commu_id = $c_commu_topic['c_commu_id'];

	$status = db_common_commu_status($u, $c_commu_id);
	if (!$status['is_commu_admin']
		&& $c_commu_topic['c_member_id'] != $u) {
		handle_kengen_error();
	}
	//---

	do_c_bbs_delete_c_commu_topic($target_c_commu_topic_id);

	client_redirect('page.php?p=c_topic_list&target_c_commu_id='.$c_commu_topic['c_commu_id']);
}

