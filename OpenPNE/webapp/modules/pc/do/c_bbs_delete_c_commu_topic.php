<?php
//---------------------------------------------------------------------------
/**
���ߥ�˥ƥ��ȥԥå����

[����]
target_c_commu_topic_id

[������쥯��]
c_home

[������쥯�Ȱ���]
target_c_commu_id

[����]
���ߥ�˥ƥ�������
���ߥ�˥ƥ��ȥԥå�������

*/
function doAction_c_bbs_delete_c_commu_topic($request) {
	$u = $GLOBALS['AUTH']->uid();

	$target_c_commu_topic_id = $request['target_c_commu_topic_id'];

	//--- ���¥����å�
	//���ߥ�˥ƥ������� or �ȥԥå�������

	$c_commu_topic = _do_c_bbs_c_commu_topic4c_commu_topic_id($target_c_commu_topic_id);
    
    $c_commu_id = $c_commu_topic['c_commu_id'];
    
    $status = db_common_commu_status($u, $c_commu_id);
    if (!$status['is_commu_admin']
        && $c_commu_topic['c_member_id'] != $u) {
        handle_kengen_error();
    }
    //---

	do_c_bbs_delete_c_commu_topic($target_c_commu_topic_id);

	client_redirect('page.php?p=c_topic_list&target_c_commu_id='.$c_commu_topic['c_commu_id']);
}
?>
