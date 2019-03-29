<?php
function pageAction_h_access_block($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	$smarty->ext_display('h_access_block.tpl');
}

?>