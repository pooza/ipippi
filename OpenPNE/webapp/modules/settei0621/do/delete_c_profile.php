<?php
// �ץ�ե�������ܺ��


function doAction_delete_c_profile($requests)
{
	man_init_admin_do();
	
	db_admin_delete_c_profile($requests['c_profile_id']);	

	admin_client_redirect('edit_c_profile', "�ץ�ե�������ܤ������ޤ���");
}

?>
