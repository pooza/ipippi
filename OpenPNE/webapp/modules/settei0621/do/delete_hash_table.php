<?php
// hash_table �κ��


function doAction_delete_hash_table($requests)
{
	man_init_admin_do();

	$hash_tbl =& AdminHashTable::singleton();
	$hash_tbl->deleteTable();
	
	admin_client_redirect('top', "�����ѥڡ���̾�򸵤��ᤷ�ޤ���");
}

?>
