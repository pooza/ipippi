<?php
//-----------------------------------------------------------------------------------
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
function doAction_fh_diary_delete_c_diary_comment($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_diary_comment_id = $requests['target_c_diary_comment_id'];
	// ----------
	$c_diary_comment = do_fh_diary_c_diary_comment4c_diary_comment_id($target_c_diary_comment_id);
	$target_c_member_id = $c_diary_comment['c_member_id'];

	//--- ���¥����å�
	//���������� or �����Ⱥ�����

    $c_diary = p_fh_diary_c_diary4c_diary_id($c_diary_comment['c_diary_id']);
    if ($c_diary['c_member_id'] != $u
        && $c_diary_comment['c_member_id'] != $u) {
        handle_kengen_error();
    }
    //---


	do_fh_diary_delete_c_diary_comment($target_c_diary_comment_id, $u);

	client_redirect("ktai_page.php?p=fh_diary&target_c_diary_id=".$c_diary['c_diary_id']."&$tail");
}

?>