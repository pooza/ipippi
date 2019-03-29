<?php
function doAction_c_event_mail($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_id = $request['c_commu_id'];
	$c_commu_topic_id = $request['c_commu_topic_id'];
	$c_member_ids = $request['c_member_ids'];
	$body = $request['body'];
	// ----------

	$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
	$c_commu_id = $c_topic['c_commu_id'];

	//--- 権限チェック

	//イベントの管理者でないと送信できない
	if(!_db_is_c_event_admin($c_commu_topic_id,$u)){
		exit();
	}
	//---

	$subject = ''; // do_c_event_mail_send_mail() でも必要とされていない by sato.kimihiko@tejimaya.com 20050924
	do_c_event_mail_send_mail($c_commu_id,$c_commu_topic_id,$u, $c_member_ids, $subject, $body);

	client_redirect("page.php?p=c_event_mail_end&target_c_commu_topic_id=$c_commu_topic_id");

}

