<?php
function normalAction_regist_end($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
		client_redirect("ktai_normal.php?p=login");
		exit;
	}
    //>	
	
	$smarty->assign("SNS_NAME", SNS_NAME);	
    $smarty->ext_display('regist_end.tpl');
}

