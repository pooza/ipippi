<?php
function pageAction_h_config_image($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	$prof = db_common_c_member_with_profile($u);
	$smarty->assign('c_member', $prof);
	
	if (defined('MAIL_ADDRESS_HASHED') && MAIL_ADDRESS_HASHED) {
		$mail_address = "p{$u}-".t_get_user_hash($u)."@" . MAIL_SERVER_DOMAIN;
	} else {
		$mail_address = "p{$u}"."@" . MAIL_SERVER_DOMAIN;
	}
	$smarty->assign('mail_address', $mail_address);

	$smarty->ext_display("h_config_image.tpl");
}

