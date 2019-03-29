<?php
// 管理ページ名のランダマイズ


function pageAction_update_hash_table(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$smarty->assign($v);
	$smarty->ext_display("update_hash_table.tpl");
}

?>
