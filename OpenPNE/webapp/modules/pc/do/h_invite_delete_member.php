<?php
function doAction_h_invite_delete_member($request) {
	$u = $GLOBALS['AUTH']->uid();
	// --- �ꥯ�������ѿ�
	$c_member_id = $request['c_member_id'];
	$c_member_ktai_id = $request['c_member_ktai_id'];
	// ----------
	//--- ���¥����å�
	//ɬ�פʤ�

	if($c_member_id) do_h_invite_delete_member_delete_c_member_pre($u, $c_member_id);
	//������
	if($c_member_ktai_id) do_h_invite_delete_member_delete_c_member_ktai_pre($u, $c_member_ktai_id);

	client_redirect("page.php?p=h_invite");
}

?>
