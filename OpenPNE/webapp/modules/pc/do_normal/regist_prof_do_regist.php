<?php
/**
�ץ�ե����������Ͽ

[����]
regist��ɬ�פʤ��

[������쥯��]
regist_end

[������쥯�Ȱ���]

[����]
��Ͽ����С�(���å����ID���Τ餵�줿���С�)

*/
function doNormalAction_regist_prof_do_regist($requests)
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
	
	//--- ���¥����å�
	//���å����������
	
    if (!n_regist_intro_is_active_sid($sid)) {
        $msg = "���ξ���URL�ϴ���̵���ˤʤäƤ��ޤ���";
        client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
        exit;
    }
	//---
	
	do_regist_prof_do_regist2_mail_send($sid);
	$c_member_id_new = do_regist_prof_do_regist($sid);
	
	//���ԼԤȥե��ɥ��
    $sql = "SELECT * FROM c_member_pre"
        ." WHERE session='$sid'";
	$one = get_array_one4db($sql);
	$c_member_id_invite = $one['c_member_id_invite'];

    $c_member_id_from = $c_member_id_invite;
    $c_member_id_to = $c_member_id_new;
	
	do_common_link_friend($c_member_id_from,$c_member_id_to);

	// pre �����Ƥ���
	do_common_delete_c_member_pre4sid($sid);
	
	do_regist_prof_do_regist_mail_send($c_member_id_from , $c_member_id_to);
	
	client_redirect("normal.php?p=regist_end");
}
?>