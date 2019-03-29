<?php
function pageAction_h_diary_edit($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// --- リクエスト変数
	$target_c_diary_id = $requests['target_c_diary_id'];
	// ----------

	if ($target_c_diary_id) {
		$smarty->assign('target_c_diary', k_p_h_diary_edit_c_diary4c_diary_id($target_c_diary_id));
	}

	if (defined('MAIL_ADDRESS_HASHED') && MAIL_ADDRESS_HASHED) {
		$mail_address = "b{$u}-".t_get_user_hash($u)."@".MAIL_SERVER_DOMAIN;
	} else {
		$mail_address = "blog"."@".MAIL_SERVER_DOMAIN;;
	}
	$smarty->assign('blog_address', $mail_address);

	$smarty->ext_display("h_diary_edit.tpl");
}

