<?php
//---------------------------------------------------------------------------
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
//shou050621
//shou050623
function doAction_fh_diary_delete_c_diary_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_diary_comment_id =  $_REQUEST['target_c_diary_comment_id'];

	foreach( $target_c_diary_comment_id as $val ) {
		
		//--- 権限チェック
		//日記作成者 or コメント作成者
		
		$target_c_diary_comment = do_fh_diary_c_diary_comment4c_diary_comment_id($val);
	    $target_c_diary_id = $target_c_diary_comment['c_diary_id'];
	    
	    $c_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
	    if ($c_diary['c_member_id'] != $u
	        && $target_c_diary_comment['c_member_id'] != $u) {

	        handle_kengen_error();
	    }    	
		//---

		//コメント削除実行
		do_fh_diary_delete_c_diary_comment($val,$u);
	}

	client_redirect("page.php?p=fh_diary&target_c_diary_id={$target_c_diary_id}");
}

