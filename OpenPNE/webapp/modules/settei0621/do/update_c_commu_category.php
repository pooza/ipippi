<?php
// �����ƥ����Խ�


function doAction_update_c_commu_category($requests)
{
	man_init_admin_do();
	
	if ($requests['c_commu_category_id']) {
		db_admin_update_c_commu_category(
			$requests['c_commu_category_id'],
			$requests['name'],
			$requests['sort_order']);

		admin_client_redirect('edit_category', "�����ƥ�����Խ����ޤ���");
	} else {
		admin_client_redirect('edit_category', "�����ƥ�����Խ��Ǥ��ޤ���Ǥ���");
		exit;
	}
}

?>
