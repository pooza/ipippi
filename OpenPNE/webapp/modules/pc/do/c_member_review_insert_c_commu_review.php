<?php
function doAction_c_member_review_insert_c_commu_review($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_commu_id = $request['target_c_commu_id'];
	$c_review_id = $request['c_review_id'];
	// ----------

	//--- 権限チェック
	//レビューコメント作者 かつ コミュニティ参加者

	$status = db_common_commu_status($u, $c_commu_id);
	if (!$status['is_commu_member']) {
		handle_kengen_error();
	}
	if(do_h_review_clip_add_c_review_id4c_review_id_c_member_id($c_review_id, $u)){
		handle_kengen_error();
		exit;
	}
	//---

	foreach($c_review_id as $value){
		if(!do_c_member_review_c_review_id4c_review_id_c_member_id($value, $u, $c_commu_id)){
			do_c_member_review_insert_c_commu_review($value, $u, $c_commu_id);
		}
	}

	client_redirect("page.php?p=c_member_review&target_c_commu_id=". $c_commu_id);
}

