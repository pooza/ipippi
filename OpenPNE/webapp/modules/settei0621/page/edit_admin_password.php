<?php
// �����ѥѥ�����ѹ�


function pageAction_edit_admin_password(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$smarty->assign($v);
	$smarty->ext_display("edit_admin_password.tpl");
}

?>