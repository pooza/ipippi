<?php
//---------------------------------------------------------------------------
/**
�ȥåפΥХʡ��򥯥�å�

[����]
target_c_banner_id

[������쥯����]
̵��

[������쥯�Ȱ���]
̵��

[����]

*/
function doNormalAction_inc_click_top_banner($request) {

	// --- �ꥯ�������ѿ�
	$target_c_banner_id = $request['target_c_banner_id'];
	// ----------

	//--- ���¥����å�
	//ɬ�פʤ�

	//---
	$p = $_SERVER['HTTP_REFERER'];
	$u = "0";
	
	do_inc_click_top_banner($target_c_banner_id, $u, $p);
	
	$c_banner = do_inc_click_top_banner_c_banner4c_banner_id($target_c_banner_id);
	client_redirect_absolute($c_banner['a_href']);
}
?>
