<?php
// ���Τ餻�����ѵ��󡢥ץ饤�Х����ݥꥷ���ι���


function doAction_edit_c_admin_info($requests)
{
	man_init_admin_do();
	
	if (db_admin_c_siteadmin($requests['target'])) {
		//update
		db_admin_update_c_siteadmin($requests['target'], $requests['body']);
	} else {
		//insert
		db_admin_insert_c_siteadmin($requests['target'], $requests['body']);
	}
	
	admin_client_redirect('edit_c_admin_info', "�ѹ����ޤ���", 'target='.$requests['target']);	
}

?>
