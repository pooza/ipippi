<?php

function doAction_c_invite_insert_c_message_commu_invite($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$target_c_commu_id = $request['target_c_commu_id'];
	$body = $request['body'];
	$c_member_id_list = $request['c_member_id_list'];
	// ----------

	if (!$c_member_id_list) {
		$msg = urlencode("������".WORD_MY_FRIEND."�����򤷤Ƥ�������");
		client_redirect("page.php?p=c_invite&target_c_commu_id={$target_c_commu_id}&msg={$msg}");
		exit;
	}

	if (is_null($body) || $body === '') {
		$msg = urlencode("��å����������Ϥ��Ƥ�������");
		client_redirect("page.php?p=c_invite&target_c_commu_id={$target_c_commu_id}&msg={$msg}");
		exit;
	}

	//--- ���¥����å�
	//�ե���

	foreach ($c_member_id_list as $c_member_id) {
		if (!_db_is_friend($c_member_id, $u)) {
			handle_kengen_error();
		}
	}
	//---


	$c_member_from = db_common_c_member4c_member_id($u);
	$c_commu = _db_c_commu4c_commu_id($target_c_commu_id);

    $subject ="���ߥ�˥ƥ����������å�����";
    $url = ABSOLUTE_PATH."page.php?p=c_home&target_c_commu_id=$target_c_commu_id";
    
// ��å�������ʸ
$message_body = <<<EOD
{$c_member_from['nickname']}���󤫤餪�����ᥳ�ߥ�˥ƥ��Υ�å��������Ϥ��Ƥ��ޤ���

���ߥ�˥ƥ�̾��
{$c_commu['name']}

��å�������
$body

���Υ��ߥ�˥ƥ���URL
$url
EOD;
    
	foreach($c_member_id_list as $key => $value){
        do_common_send_message_syoukai_commu($u, $value, $subject, $message_body);
	}

	client_redirect("page.php?p=c_home&target_c_commu_id=$target_c_commu_id");
}
?>
