<?php
//shou050627
//­���Ȥ��Τ餻�᡼����ʬ���ɲ�
function pageAction_h_config_prof_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$prof = $_REQUEST['prof'];// do:h_config_prof ���ͥ����å��Ѥ�
	// ----------

	$smarty->assign('inc_navi',fetch_inc_navi("h"));

	$smarty->assign('prof', $prof);
	$smarty->assign('profile_list', db_common_c_profile_list4null());
		
	$smarty->ext_display("h_config_prof_confirm.tpl");
}
?>
