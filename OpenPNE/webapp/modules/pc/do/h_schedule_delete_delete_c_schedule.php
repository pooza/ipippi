<?php
function doAction_h_schedule_delete_delete_c_schedule($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_schedule_id = $request['target_c_schedule_id'];
	// ----------

	//--- ���¥����å�
	//�������塼�������

	$c_schedule = p_common_c_schedule4c_schedule_id($target_c_schedule_id);
	if ($c_schedule['c_member_id'] != $u) {
		exit("�ǡ����Ϥ���ޤ���");
	}
	//---


	do_h_schedule_delte_delete_c_schedule4c_schedule_id($target_c_schedule_id);
  
	client_redirect("page.php?p=h_schedule_delete_end");
}
?>
