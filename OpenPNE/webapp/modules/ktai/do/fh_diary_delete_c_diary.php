<?php
//---------------------------------------------------------------------------------
/**
�������

[����]
target_c_diary_id

[������쥯��]
fh_diary_list

[������쥯�Ȱ���]
target_c_member_id

[����]
������񤤤����С�

*/
function doAction_fh_diary_delete_c_diary($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$target_c_diary_id = $requests['target_c_diary_id'];
	// ----------

	//--- ���¥����å�
	//����������

    $c_diary = p_fh_diary_c_diary4c_diary_id($target_c_diary_id);
    if ($c_diary['c_member_id'] != $u) {
        handle_kengen_error();
    }    
    //---


	do_fh_diary_delete_c_diary($target_c_diary_id);

	client_redirect("ktai_page.php?p=fh_diary_list&target_c_member_id=$u&$tail");
}

?>