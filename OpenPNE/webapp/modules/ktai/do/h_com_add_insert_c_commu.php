<?php
//-----------------------------------------------------------------------
function doAction_h_com_add_insert_c_commu($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- �ꥯ�������ѿ�
	$c_commu_category_id = $requests['c_commu_category_id'];
	$name = $requests['name'];
	$info = $requests['info'];
	$public_flag = $requests['public_flag'];
	// ----------

	//--- ���¥����å�
	//TODO:�������ƥ���ϥ���Ȥ���

	//---        


    $c_member_id = $u;

    $c_commu_id = do_h_com_add_insert_c_commu($c_member_id,$name,$c_commu_category_id,$info,$public_flag);

    //�����Ԥ򥳥ߥ���С��ˤ���
    do_inc_join_c_commu($c_commu_id,$c_member_id);

    client_redirect("ktai_page.php?p=c_home&target_c_commu_id={$c_commu_id}&{$tail}");    
}

?>