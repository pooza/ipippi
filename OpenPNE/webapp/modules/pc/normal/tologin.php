<?php

function normalAction_tologin($smarty,$requests)
{
	// ������쥯��
	header("Refresh: 3; URL=" . get_login_url());
	
	
	//---- inc_ �ƥ�ץ졼���� �ѿ� ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	
	$msg = "";
	switch ($requests['error_code']) {
	case "login_failed":
		$msg = "������˼��Ԥ��ޤ��������١�����������ԤäƤ���������";
		break;
	}
	if ($msg) $smarty->assign('msg', $msg);
	
	$smarty->assign("login_url", get_login_url());
	$smarty->ext_display('tologin.tpl');
}

?>
