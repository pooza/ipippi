<?php
//---------------------------------------------------------------------------
/**
コミュニティ管理者交代要請を取り消し

[引数]
target_c_commu_admin_confirm_id

[リダイレクト先]
c_edit_member

[リダイレクト引数]

[権限]
コミュ二ティ管理者

*/
function doAction_c_edit_member_delete_c_commu_admin_confirm($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_admin_confirm_id = $request['target_c_commu_admin_confirm_id'];
	// ----------

    //--- 権限チェック
    //コミュニティ管理者
    
	$c_commu_admin_confirm = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($target_c_commu_admin_confirm_id);
	$target_c_commu_id = $c_commu_admin_confirm['c_commu_id'];
	    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    //---


	do_c_edit_member_delete_c_commu_admin_confirm($target_c_commu_admin_confirm_id);

    client_redirect("page.php?p=c_edit_member&target_c_commu_id=$target_c_commu_id");
}
?>
