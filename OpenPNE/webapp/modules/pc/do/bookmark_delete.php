<?php
function doAction_bookmark_delete($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_member_id = $request['target_c_member_id'];
	// ----------

	//--- ���¥����å�
	//�֥å��ޡ�����Ͽ����Ƥ���
	//��Ͽ����Ƥ��ʤ��Ƥ��ä˱ƶ��Ϥʤ��Τǥ����å����ʤ�
	//---

	do_h_bookmark_delete($u, $target_c_member_id);

	client_redirect("page.php?p=h_bookmark_list");
}
?>
