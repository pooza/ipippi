<?php
// ログアウト


function doAction_logout($requests)
{
	man_init_admin_do();
	
	$GLOBALS['AUTH']->logout();
	
	$hash_tbl =& AdminHashTable::singleton();
	$p = $hash_tbl->hash('login', 'normal');
	$m = $GLOBALS['__Framework']['current_module'];
	client_redirect("module_normal.php?m=$m&p=$p");
}


