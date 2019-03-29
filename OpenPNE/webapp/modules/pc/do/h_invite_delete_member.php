<?php
function doAction_h_invite_delete_member($request) {
	$u = $GLOBALS['AUTH']->uid();
	// --- リクエスト変数
	$c_member_id = $request['c_member_id'];
	$c_member_ktai_id = $request['c_member_ktai_id'];
	// ----------
	//--- 権限チェック
	//必要なし

	if($c_member_id) do_h_invite_delete_member_delete_c_member_pre($u, $c_member_id);
	//携帯用
	if($c_member_ktai_id) do_h_invite_delete_member_delete_c_member_ktai_pre($u, $c_member_ktai_id);

	client_redirect("page.php?p=h_invite");
}


