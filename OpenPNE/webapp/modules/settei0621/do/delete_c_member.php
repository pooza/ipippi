<?php
// �桼�����������


function doAction_delete_c_member($requests)
{
	man_init_admin_do();
	
	db_common_delete_c_member($requests['target_c_member_id']);

	admin_client_redirect('top', "�桼�����ζ�������λ���ޤ���");
}

?>
