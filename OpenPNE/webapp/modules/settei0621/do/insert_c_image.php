<?php
// �������������


function doAction_insert_c_image($requests)
{
	man_init_admin_do();
	
	if (!empty($_FILES['upfile']) && !empty($requests['filename'])) {
		image_data_delete($requests['filename']);
		admin_insert_c_image($_FILES['upfile'], $requests['filename']);
	
		admin_client_redirect('edit_c_image', "��������Ͽ���ޤ���", "filename=".$requests['filename']);
		exit;
	}
	
	admin_client_redirect('edit_c_image');
}

?>
