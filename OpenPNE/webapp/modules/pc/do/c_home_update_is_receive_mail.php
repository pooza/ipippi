<?php
// /shou050531
function doAction_c_home_update_is_receive_mail($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $request['target_c_commu_id'];
	$is_receive_mail = $request['is_receive_mail'];
	$is_receive_mail_pc = $request['is_receive_mail_pc'];
	// ----------

	//--- ���¥����å�
	//ɬ�פʤ�
	//---	

	//PC&ktai��ξ������٤˹���
	do_c_home_update_is_receive_mail($target_c_commu_id, $u, $is_receive_mail, $is_receive_mail_pc);

	client_redirect("page.php?p=c_home&target_c_commu_id=$target_c_commu_id");
}
?>
