<?php

	//���������ǧ����
//---------------------------------------------------------------------------
function pageAction_h_delete_diary($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_diary_id = $requests['target_c_diary_id'];
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));
	$smarty->assign("target_c_diary", p_h_diary_edit_c_diary4c_diary_id($target_c_diary_id));

	$smarty->ext_display("h_delete_diary.tpl");
}
?>
