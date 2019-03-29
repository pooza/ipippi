<?php
function doNormalAction_update_ktai_address($requests)
{
    
	// --- �ꥯ�������ѿ�
	$ses = $requests['ses'];
	$password = $requests['password'];
	// ----------
    
    // ���å����ͭ�����ɤ���
    if (!$pre = c_ktai_address_pre4session($ses)) {
        // ̵���ξ�硢login �إ�����쥯��
        client_redirect("ktai_normal.php?p=login");
        exit;
    }

    $c_member_id = $pre['c_member_id'];
    $ktai_address = $pre['ktai_address'];
    
    // �ѥ���ɥ����å�
    if (!db_common_authenticate_password($c_member_id, $password)) {
    	client_redirect("ktai_normal.php?p=login2&msg=18&ses=" . $ses);
    	exit;
    }

    k_do_update_ktai_address($c_member_id, $ktai_address);
    k_do_delete_ktai_address_pre($pre['c_ktai_address_pre_id']);
    
    // login �ڡ����إ�����쥯��
    client_redirect("ktai_normal.php?p=login&msg=19&kad=" . urlencode(t_encrypt($ktai_address)));
    exit;
}
?>
