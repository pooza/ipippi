<?php
//---------------------------------------------------------------------------
/**
メンバーをコミュニティからの削除

[引数]
target_c_commu_id
target_c_member_id

[リダイレクト先]
c_edit_member

[リダイレクト引数]

[権限]
コミュ二ティ管理者

*/
function doAction_c_edit_member_delete_c_commu_member($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $request['target_c_commu_id'];
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//--- 権限チェック
	//コミュニティ管理者
	//targetメンバーが管理者(＝自分)でない

	$status = db_common_commu_status($u, $target_c_commu_id);
	if (!$status['is_commu_admin']) {
		handle_kengen_error();
	}

	if ($target_c_member_id == $u) {
		client_redirect("page.php?p=c_taikai_err_admin&target_c_commu_id=$target_c_commu_id");
		exit;
	}
	//---

	// maruyama: 2005/04/08 コミュニティからはずした場合は管理者委譲依頼も削除
	_do_delete_c_commu_admin_confirm2($target_c_commu_id,$target_c_member_id);
	// -----
	do_c_edit_member_delete_c_commu_member($target_c_commu_id,$target_c_member_id);

	client_redirect("page.php?p=c_edit_member&target_c_commu_id=$target_c_commu_id");
}

