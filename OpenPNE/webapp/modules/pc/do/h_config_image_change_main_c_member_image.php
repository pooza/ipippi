<?php
/**
�ᥤ��ץ�ե�����������ѹ�

[����]


[������쥯����]
h_config_image

[������쥯�Ȱ���]

[����]
��ʬ

*/
function doAction_h_config_image_change_main_c_member_image($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$img_num = $request['img_num'];
	// ----------

	//--- ���¥����å�
	//ɬ�פʤ�

	//---


	do_h_config_image_change_c_member_main_image($u,$img_num);

    client_redirect("page.php?p=h_config_image");
}
?>
