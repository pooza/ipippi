<?php
//---------------------------------------------------------------------------
function doAction_bookmark_add($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$c_member_id_to = $request['c_member_id'];
	// ----------

	//--- ���¥����å�
	//��ʬ�ʳ� and �֥å��ޡ�����Ͽ����Ƥ��ʤ�

	if ($c_member_id_to == $u) {
		handle_kengen_error();
	}

	if(do_bookmark_add_is_bookmark($u, $c_member_id_to)) {
		client_redirect("page.php?p=h_bookmark_list");
		exit;
	}
	//---	


	do_f_bookmark_add($u, $c_member_id_to);
	client_redirect("page.php?p=h_bookmark_list");
}
?>
