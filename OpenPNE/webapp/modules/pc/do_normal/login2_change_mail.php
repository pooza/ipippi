<?php
function doNormalAction_login2_change_mail($requests)
{
	// --- �ꥯ�������ѿ�
	$sid = $requests['sid'];
	$password = $requests['password'];
	// ----------
	
	//--- ���¥����å�
	//���å����������
	//�ѥ���ɤ�������
	
	if (!do_change_mail($sid, $password)) {
	    $msg = urlencode("�ѥ���ɤ��㤤�ޤ���");
	    client_redirect("normal.php?p=login2&sid=$sid&msg=$msg");
	    exit;
	}
	//---
	
    $msg = "�᡼�륢�ɥ쥹���ѹ�����ޤ�����";
    client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
    exit;
}
?>