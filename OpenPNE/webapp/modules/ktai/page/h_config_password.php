<?php

function pageAction_h_config_password($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	$smarty->ext_display("h_config_password.tpl");
}

?>