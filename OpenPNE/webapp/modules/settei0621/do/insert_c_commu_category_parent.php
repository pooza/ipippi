<?php
// �楫�ƥ����ɲ�


function doAction_insert_c_commu_category_parent($requests)
{
	man_init_admin_do();
	
	if ($requests['name']) {
		db_admin_insert_c_commu_category_parent($requests['name'], $requests['sort_order']);

		admin_client_redirect('edit_category', "�楫�ƥ�����ɲä��ޤ���");
	} else {
		admin_client_redirect('edit_category', "�楫�ƥ�����ɲäǤ��ޤ���Ǥ���");
	}
}

?>
