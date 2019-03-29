<?php
//---------------------------------------------------------------------------
/**
日記削除

[引数]
target_c_diary_id

[リダイレクト]
fh_diary_list

[リダイレクト引数]
target_c_member_id

[権限]
日記を書いたメンバー

*/
//shou050626
function doAction_fh_diary_delete_c_diary($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_diary_id = $request['target_c_diary_id'];
	// ----------

	//--- 権限チェック
	//日記作成者

    $c_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
    if ($c_diary['c_member_id'] != $u) {
        handle_kengen_error();
    }    
    //---
    

	do_fh_diary_delete_c_diary($target_c_diary_id);

	client_redirect("page.php?p=fh_diary_list&target_c_member_id={$u}");
}
?>
