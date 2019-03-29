<?php

function normalAction_setup($smarty,$requests)
{
	// c_member_secureにデータがあった場合は無効
	$sql = "SELECT c_member_secure_id FROM c_member_secure LIMIT 1";
	if (get_one4db($sql)) exit;
	
	if (!(defined('ENCRYPT_KEY') && ENCRYPT_KEY) ||
		strlen(ENCRYPT_KEY) > 56)
	{
		echo "ENCRYPT_KEYが適切に設定されていません。<br>\n";
		echo "config.inc の設定を見直してください。<br>\n";
		exit;
	}
	
	$v = array();
	$smarty->ext_display("setup.tpl");
}

?>