<?php

function normalAction_login2($smarty,$requests)
{
	// --- �ꥯ�������ѿ�
	$ses = $requests['ses'];
	$c_member_id = intval($requests['id']);	
	// ----------
    
    // ���å����ͭ�����ɤ���
    if (!$pre = c_ktai_address_pre4session($ses)) {
        // ̵���ξ�硢login �إ�����쥯��
        $c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
        client_redirect("ktai_normal.php?p=login&kad=".urlencode(t_encrypt($c_member_secure['ktai_address'])));
        exit;
    }
    
    $smarty->assign('ses', $ses);
    $smarty->assign('pre', $pre);
    $smarty->ext_display('login2.tpl');
}

?>