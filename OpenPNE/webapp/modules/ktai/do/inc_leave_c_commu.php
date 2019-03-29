<?php
//---------------------------------------------------------------------------
/**
コミュニティから退会

[引数]
target_c_commu_id

[リダイレクト先]
c_home

[リダイレクト引数]
target_c_commu_id

[権限]

*/
function doAction_inc_leave_c_commu($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	// ----------
	$c_member_id = $u;

	//--- 権限チェック
	//コミュニティメンバー and 管理者でない

	$is_admin	= do_common_is_commu_admin($target_c_commu_id, $c_member_id);
	$is_member	= do_common_is_c_commu_member($target_c_commu_id, $c_member_id);

	if($is_admin){
		//msg=10 "管理者なので退会できません。"
		client_redirect("ktai_page.php?p=c_taikai_err_admin&target_c_commu_id=$target_c_commu_id&msg=10&$tail");
		return;
	}
	if(!$is_member){
		//msg=11 "このコミュニティのメンバではありません。"
		client_redirect("ktai_page.php?p=c_taikai_err_no_member&target_c_commu_id=$target_c_commu_id&msg=11&$tail");
		break;
	}
	//---

	do_inc_leave_c_commu($target_c_commu_id,$c_member_id);

	// maruyama: 2005/04/08
	_do_delete_c_commu_admin_confirm2($target_c_commu_id,$c_member_id);
	// ---------

	client_redirect("ktai_page.php?p=c_home&target_c_commu_id=$target_c_commu_id&$tail");
}

