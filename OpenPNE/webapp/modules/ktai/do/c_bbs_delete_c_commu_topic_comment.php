<?php
//----------------------------------------------------------------------------
/**
�����Ⱥ��

[����]
target_c_commu_topic_comment_id

[������쥯��]
c_bbs

[������쥯�Ȱ���]
target_c_commu_topic_id
target_c_diary_comment_id
[����]
���ߥ�˥ƥ�������
���ߥ�˥ƥ����С�

*/
function doAction_c_bbs_delete_c_commu_topic_comment($requests)
{
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];


	// --- �ꥯ�������ѿ�
	$target_c_commu_topic_comment_id = $requests['target_c_commu_topic_comment_id'];
	// ----------
	$c_commu_topic_comment = do_c_bbs_c_commu_topic_comment4c_commu_topic_comment_id($target_c_commu_topic_comment_id);

	//--- ���¥����å�
	//���ߥ�˥ƥ������� or �����Ⱥ�����

    $c_commu_topic = _do_c_bbs_c_commu_topic4c_commu_topic_id($c_commu_topic_comment['c_commu_topic_id']);
    $c_commu_id = $c_commu_topic['c_commu_id'];

    $status = db_common_commu_status($u, $c_commu_id);
    if (!$status['is_commu_admin']
        && $c_commu_topic_comment['c_member_id'] != $u) {
        handle_kengen_error();
    }
    //---


	do_c_bbs_delete_c_commu_topic_comment($target_c_commu_topic_comment_id);

	client_redirect('ktai_page.php?p=c_bbs&target_c_commu_topic_id='.$c_commu_topic_comment['c_commu_topic_id']."&$tail");
}

?>