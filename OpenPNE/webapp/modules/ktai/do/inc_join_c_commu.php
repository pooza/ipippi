<?php
//------------------------------------------------------------------------------
/**
コミュニティに参加

[引数]
target_c_commu_id

[リダイレクト]
c_home

[リダイレクト引数]
target_c_commu_id

[権限]
全メンバー

*/
function doAction_inc_join_c_commu($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	$status = do_common_get_c_join_status($u, $target_c_commu_id);

	switch ($status) {
	//承認必要なし
	case STATUS_C_JOIN_REQUEST_FREE:
		do_inc_join_c_commu($target_c_commu_id, $u);
		do_inc_join_c_commu_send_mail($target_c_commu_id, $u);
	    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
		break;

	//管理者承認必要
	case STATUS_C_JOIN_REQUEST_NEED:
	    client_redirect("ktai_page.php?p=c_join_request&target_c_commu_id=$target_c_commu_id&$tail");
		break;

	//承認待ち
	case STATUS_C_JOIN_WAIT:
	    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
		break;

	//既に参加
	case STATUS_C_JOIN_ALREADY:
	    client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
		break;
	}
}
?>
