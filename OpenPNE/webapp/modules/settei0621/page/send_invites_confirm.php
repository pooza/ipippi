<?php
// 一括招待メール送信 確認画面

function pageAction_send_invites_confirm(&$smarty,$requests)
{
	man_init_admin_page($smarty);
	$v = array();
	
	$v['SNS_NAME'] = SNS_NAME;
	
	$v['cannot_send'] = true;
	$c_member_id_invite = 1;
	
	if ($requests['pc_mails'] &&
		(!defined('OPENPNE_REGIST_FROM') || (OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC))
		) {
		$params = array(
			"c_member"		=> db_common_c_member4c_member_id($c_member_id_invite),
			"sid"			=> "xxxxxxxxxx",
			"invite_message"=> $requests['message'],
		);	
		list($subject, $body) = fetch_mail_m_tpl("m_pc_syoutai_mail.tpl", $params);
		$v['pc_subject'] = $subject;
		$v['pc_body'] = $body;
		$v['cannot_send'] = false;
	}
	
	if ($requests['ktai_mails'] &&
		(!defined('OPENPNE_REGIST_FROM') || ((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1))
		) {
	    $params['SNS_NAME'] = SNS_NAME;
	    $params['url'] = ABSOLUTE_PATH . "ktai_normal.php?p=regist_pre&ses=xxxxxxxxxx";
	    $params['c_member'] = db_common_c_member4c_member_id($c_member_id_invite);
	    $params['message'] = $requests['message']; 
	    list($subject, $body) = fetch_mail_m_tpl("m_ktai_regist_invite.tpl", $params);
		$v['ktai_subject'] = $subject;
		$v['ktai_body'] = $body;
		$v['cannot_send'] = false;
	}
	
	$smarty->assign($v);
	$smarty->ext_display("send_invites_confirm.tpl");
}

?>