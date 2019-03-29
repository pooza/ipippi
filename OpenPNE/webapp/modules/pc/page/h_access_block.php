<?php

function pageAction_h_access_block($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->ext_display('h_access_block.tpl');
}
?>
