<?php
// �ץ�ե�����������Խ�


function doAction_update_c_profile_option($requests)
{
	man_init_admin_do();
	
	if ($requests['c_profile_option_id'] && $requests['value']) {
		db_admin_update_c_profile_option($requests['c_profile_option_id'], $requests['value'], $requests['sort_order']);
	}

	admin_client_redirect('edit_c_profile', "�ץ�ե������������ѹ����ޤ���");
}

?>
