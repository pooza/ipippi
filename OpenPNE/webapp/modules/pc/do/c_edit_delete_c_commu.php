<?php
//---------------------------------------------------------------------------
/**
コミュニティの削除

[引数]
target_c_commu_id

[リダイレクト先]
c_home

[リダイレクト引数]

[権限]
コミュニティ管理者

*/
function doAction_c_edit_delete_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $request['target_c_commu_id'];
	// ----------

    //--- 権限チェック
    //コミュニティ管理者
    
    $status = db_common_commu_status($u, $target_c_commu_id);
    if (!$status['is_commu_admin']) {
        handle_kengen_error();
    }
    //---
    
    
	do_c_edit_delete_c_commu($target_c_commu_id);

	client_redirect("page.php?p=h_com_find_all");
}

