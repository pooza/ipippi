<?php



//---------------------------------------------------------------------------
	//shou050627
function pageAction_h_ashiato($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$c_member = db_common_c_member4c_member_id($u);
	$smarty->assign('c_member',$c_member);

	// �������ȥꥹ��
	$smarty->assign("c_ashiato_list", p_h_ashiato_c_ashiato_list4c_member_id($u, 30));

	// �������ȿ�
	$smarty->assign("c_ashiato_num", p_h_ashiato_c_ashiato_num4c_member_id($u));

	//---- �ڡ���ɽ�� ----//
	$smarty->ext_display("h_ashiato.tpl");

}
?>
