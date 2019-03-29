<?php

function doAction_c_invite_insert_c_message_commu_invite($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$target_c_commu_id = $request['target_c_commu_id'];
	$body = $request['body'];
	$c_member_id_list = $request['c_member_id_list'];
	// ----------

	if (!$c_member_id_list) {
		$msg = urlencode("教える".WORD_MY_FRIEND."を選択してださい。");
		client_redirect("page.php?p=c_invite&target_c_commu_id={$target_c_commu_id}&msg={$msg}");
		exit;
	}

	if (is_null($body) || $body === '') {
		$msg = urlencode("メッセージを入力してください");
		client_redirect("page.php?p=c_invite&target_c_commu_id={$target_c_commu_id}&msg={$msg}");
		exit;
	}

	//--- 権限チェック
	//フレンド

	foreach ($c_member_id_list as $c_member_id) {
		if (!_db_is_friend($c_member_id, $u)) {
			handle_kengen_error();
		}
	}
	//---


	$c_member_from = db_common_c_member4c_member_id($u);
	$c_commu = _db_c_commu4c_commu_id($target_c_commu_id);

    $subject ="コミュニティおすすめメッセージ";
    $url = ABSOLUTE_PATH."page.php?p=c_home&target_c_commu_id=$target_c_commu_id";
    
// メッセージ本文
$message_body = <<<EOD
{$c_member_from['nickname']}さんからおすすめコミュニティのメッセージが届いています。

コミュニティ名：
{$c_commu['name']}

メッセージ：
$body

このコミュニティのURL
$url
EOD;
    
	foreach($c_member_id_list as $key => $value){
        do_common_send_message_syoukai_commu($u, $value, $subject, $message_body);
	}

	client_redirect("page.php?p=c_home&target_c_commu_id=$target_c_commu_id");
}

