<?php
// ユーザー強制退会 確認画面


function pageAction_delete_c_member_confirm(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['c_profile_list'] = db_common_c_profile_list4null();
	$v['c_member'] = db_common_c_member4c_member_id($requests['target_c_member_id'], true, true, 'private');
	
	$smarty->assign($v);
	$smarty->ext_display("delete_c_member_confirm.tpl");
}

?>