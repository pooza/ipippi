<?php
function normalAction_regist_pre($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
		client_redirect("ktai_normal.php?p=login");
		exit;
	}
    //>
    
	// --- �ꥯ�������ѿ�
	$ses = $requests['ses'];
	// ----------

    // ���å����ͭ�����ɤ���
    if (!$pre = c_member_ktai_pre4session($ses)) {
        // ̵���ξ�硢login �إ�����쥯��
        client_redirect("ktai_normal.php?p=login");
        exit;
    }
    
    $smarty->assign("ses", $ses);
    $smarty->assign("SNS_NAME", SNS_NAME);
    $smarty->ext_display('regist_pre.tpl');
}
?>
