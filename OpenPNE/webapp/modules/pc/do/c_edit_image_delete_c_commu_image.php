<?php
//---------------------------------------------------------------------------
/**
コミュニティ写真削除

[引数]
target_c_commu_id

[リダイレクト先]
c_edit_image

[リダイレクト引数]

[権限]
コミュニティ管理者

*/
function doAction_c_edit_image_delete_c_commu_image($request) {
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
    
    
    $c_commu = p_common_c_commu4c_commu_id($target_c_commu_id);
    image_data_delete($c_commu['image_filename']);
	    
	do_c_edit_image_delete_c_commu_image($target_c_commu_id);

	client_redirect("page.php?p=c_edit&target_c_commu_id=$target_c_commu_id");
}

