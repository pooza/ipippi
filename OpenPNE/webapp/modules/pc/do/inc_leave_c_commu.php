<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ��������

[����]
target_c_commu_id

[������쥯����]
c_home

[������쥯�Ȱ���]
target_c_commu_id

[����]

*/
function doAction_inc_leave_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $request['target_c_commu_id'];
	// ----------
	$c_member_id = $u;

	//--- ���¥����å�
	//���ߥ�˥ƥ����С��Ǵ����ԤǤϤʤ�

	$is_admin	= do_common_is_commu_admin($target_c_commu_id, $c_member_id);
	$is_member	= do_common_is_c_commu_member($target_c_commu_id, $c_member_id);

	if($is_admin){
		client_redirect("page.php?p=c_taikai_err_admin&target_c_commu_id=$target_c_commu_id");

	}

	if(!$is_member){
		client_redirect("page.php?p=c_taikai_err_no_member&target_c_commu_id=$target_c_commu_id");

	}
	//---


do_inc_leave_c_commu($target_c_commu_id,$c_member_id);

// maruyama: 2005/04/08
_do_delete_c_commu_admin_confirm2($target_c_commu_id,$c_member_id);
// ---------

client_redirect("page.php?p=c_home&target_c_commu_id=$target_c_commu_id");
}
?>
