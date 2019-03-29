<?php
//-----------------------------------------------------------------------------------
/**
日記コメント削除

[引数]
target_c_diary_comment_id

[リダイレクト]
fh_diary_list

[リダイレクト引数]
target_c_member_id

[権限]
日記を書いたメンバー
コメントを書いたメンバー

*/
function doAction_fh_diary_delete_c_diary_comment($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_diary_comment_id = $requests['target_c_diary_comment_id'];
	// ----------
	$c_diary_comment = do_fh_diary_c_diary_comment4c_diary_comment_id($target_c_diary_comment_id);
	$target_c_member_id = $c_diary_comment['c_member_id'];

	//--- 権限チェック
	//日記作成者 or コメント作成者

    $c_diary = p_fh_diary_c_diary4c_diary_id($c_diary_comment['c_diary_id']);
    if ($c_diary['c_member_id'] != $u
        && $c_diary_comment['c_member_id'] != $u) {
        handle_kengen_error();
    }
    //---


	do_fh_diary_delete_c_diary_comment($target_c_diary_comment_id, $u);

	client_redirect("ktai_page.php?p=fh_diary&target_c_diary_id=".$c_diary['c_diary_id']."&$tail");
}

