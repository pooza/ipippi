<?php
//---------------------------------------------------------------------------
/**
�����ɤΥХʡ��򥯥�å�

[����]
target_c_banner_id

[������쥯����]
̵��

[������쥯�Ȱ���]
̵��

[����]

*/
function doAction_inc_click_side_banner($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_banner_id = $request['target_c_banner_id'];
	// ----------

	//--- ���¥����å�
	//ɬ�פʤ�

	//---
	$p = $_SERVER['HTTP_REFERER'];

	do_inc_click_side_banner($target_c_banner_id, $u, $p);

	$c_banner = do_inc_click_side_banner_c_banner4c_banner_id($target_c_banner_id);
	client_redirect_absolute($c_banner['a_href']);
}
?>
