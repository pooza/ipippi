<?php
function normalAction_public_invite_end($smarty,$requests)
{
	// �����ץ�����SNS�ʳ��Ǥ�̵��
	if (IS_CLOSED_SNS) {
		client_redirect_login();
		exit;
	}
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
    //>
	
	//---- inc_ �ƥ�ץ졼���� �ѿ� ----//
	$smarty->assign('inc_page_header', fetch_inc_page_header("public"));
	
	$smarty->assign('SNS_NAME', SNS_NAME);
	
	$smarty->ext_display("public_invite_end.tpl");
}
?>
