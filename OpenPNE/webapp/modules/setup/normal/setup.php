<?php

function normalAction_setup($smarty,$requests)
{
	// c_member_secure�˥ǡ��������ä�����̵��
	$sql = "SELECT c_member_secure_id FROM c_member_secure LIMIT 1";
	if (get_one4db($sql)) exit;
	
	if (!(defined('ENCRYPT_KEY') && ENCRYPT_KEY) ||
		strlen(ENCRYPT_KEY) > 56)
	{
		echo "ENCRYPT_KEY��Ŭ�ڤ����ꤵ��Ƥ��ޤ���<br>\n";
		echo "config.inc �������ľ���Ƥ���������<br>\n";
		exit;
	}
	
	$v = array();
	$smarty->ext_display("setup.tpl");
}

?>