<?php
function doAction_h_review_clip_list_delete_c_review_clip($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$c_review_clips = $request['c_review_clips'];
	// ----------

	//--- ���¥����å�
	//����å׺�����
	//do_h_review_clip_list_delete_c_review_clip ������б��Ѥ�
	//---


	do_h_review_clip_list_delete_c_review_clip($u, $c_review_clips);	

	client_redirect("page.php?p=h_review_clip_list");
}
?>
