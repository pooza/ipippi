<?php
function pageAction_c_invite($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
	
	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------

	//������ե��ɥꥹ��
	$smarty->assign("c_friend_list", k_p_c_invite_c_friend_list_random4c_member_id4c_commu_id($u, $target_c_commu_id, 50));
	
	//���ߥ�˥ƥ��ɣ�
	$smarty->assign("target_c_commu_id", $target_c_commu_id);
    $smarty->assign("c_commu", _db_c_commu4c_commu_id($target_c_commu_id));
	
	
	$smarty->ext_display("c_invite.tpl");
	
}

?>