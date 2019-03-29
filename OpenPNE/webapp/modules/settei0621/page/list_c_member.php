<?php
// ユーザー情報のリスト表示・強制退会

function pageAction_list_c_member(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	$pager = array();

	$v['SNS_NAME'] = SNS_NAME;
	$v['c_profile_list'] = db_common_c_profile_list4null();

	if ($requests['mail_address']) {
		$v['c_member_list'] = db_admin_c_member4mail_address($requests['mail_address']);
	} else {
		$v['c_member_list'] = db_admin_c_member_list($requests['page'], $requests['page_size'], $pager);
	}
	foreach ($v['c_member_list'] as $key => $value) {
		$v['c_member_list'][$key]['c_member_invite'] =
			db_common_c_member4c_member_id_LIGHT($value['c_member_id_invite']);
	}
	$v['pager'] = $pager;

	$smarty->assign($v);
	$smarty->ext_display("list_c_member.tpl");
}

