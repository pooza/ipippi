<?php
function normalAction_regist_prof($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
    //>
    	
	// --- �ꥯ�������ѿ�
	$sid = $requests['sid'];
	// ----------

    if (!n_regist_intro_is_active_sid($sid)) {
        $msg = "���ξ���URL�ϴ���̵���ˤʤäƤ��ޤ���";
        client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
        exit;
    }
            
	//---- inc_ �ƥ�ץ졼���� �ѿ� ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("regist") );

	$c_member_pre = p_common_c_member_pre4c_member_pre_session($sid);
	$smarty->assign('c_member_pre', $c_member_pre);
    $smarty->assign('sid', $sid);
	
	$smarty->ext_display("regist_prof.tpl");
}
?>