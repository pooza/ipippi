<?php
//---------------------------------------------------------------------------
/**
���������Ⱥ��

[����]
target_c_diary_comment_id

[������쥯��]
fh_diary_list

[������쥯�Ȱ���]
target_c_member_id

[����]
������񤤤����С�
�����Ȥ�񤤤����С�

*/
//shou050621
//shou050623
function doAction_fh_diary_delete_c_diary_comment($request) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_diary_comment_id =  $_REQUEST['target_c_diary_comment_id'];

	foreach( $target_c_diary_comment_id as $val ) {
		
		//--- ���¥����å�
		//���������� or �����Ⱥ�����
		
		$target_c_diary_comment = do_fh_diary_c_diary_comment4c_diary_comment_id($val);
	    $target_c_diary_id = $target_c_diary_comment['c_diary_id'];
	    
	    $c_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
	    if ($c_diary['c_member_id'] != $u
	        && $target_c_diary_comment['c_member_id'] != $u) {

	        handle_kengen_error();
	    }    	
		//---

		//�����Ⱥ���¹�
		do_fh_diary_delete_c_diary_comment($val,$u);
	}

	client_redirect("page.php?p=fh_diary&target_c_diary_id={$target_c_diary_id}");
}
?>
