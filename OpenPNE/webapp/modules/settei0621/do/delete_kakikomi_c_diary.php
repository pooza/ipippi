<?php
// �񤭹��ߴ���(�������)


function doAction_delete_kakikomi_c_diary($requests)
{
	man_init_admin_do();
	
	do_fh_diary_delete_c_diary($requests['target_c_diary_id']);

	admin_client_redirect('delete_kakikomi', "�����������ޤ���");
}

?>