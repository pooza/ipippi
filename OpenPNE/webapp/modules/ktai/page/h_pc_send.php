<?php
function pageAction_h_pc_send($smarty, $requests)
{
	//<PCKTAI
	if (defined('OPENPNE_ENABLE_PC') && !OPENPNE_ENABLE_PC) {
		client_redirect('ktai_page.php?p=h_home&' . $GLOBALS['KTAI_URL_TAIL']);
		exit;
	}
	//>
	
	$smarty->ext_display("h_pc_send.tpl");
}

?>