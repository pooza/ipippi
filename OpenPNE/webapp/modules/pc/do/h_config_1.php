<?php
//---------------------------------------------------------------------------
/**
設定変更

[引数]
mail_address

[リダイレクト先]
h_home

[リダイレクト引数]

[権限]
自分

*/
function doAction_h_config_1($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$pc_address = $request['pc_address'];
	$pc_address2 = $request['pc_address2'];
	// ----------

	$msg_list = array();
	if (!$pc_address)  $msg_list[] = "メールアドレスを入力してください";
	if (!$pc_address2)  $msg_list[] = "メールアドレス(確認)を入力してください";
    if ($pc_address != $pc_address2) $msg_list[] = "メールアドレスが一致しません";
	if (!db_common_is_mailaddress($pc_address)) $msg_list[] = "メールアドレスを正しく入力してください";
	
	if ($msg_list) {
		$msg = array_shift($msg_list);
		client_redirect("page.php?p=h_config&msg=".urlencode($msg));
		exit;
	}

	$c_member_id = _db_c_member_id4pc_address($pc_address);
	if( $c_member_id == $u ){
		//自分のメールアドレス
		$msg = urlencode("入力されたメールアドレスは既に登録されています。");
		client_redirect("page.php?p=h_config&msg=$msg");
		exit;
	}else if( $c_member_id ){
		//既に使われている
		$msg = urlencode("入力されたメールアドレスは既に登録されています。");
		client_redirect("page.php?p=h_config&msg=$msg");
		exit;
	}

    if (is_ktai_mail_address($pc_address)) {
        $msg = urlencode("携帯電話アドレスは記入できません");
        client_redirect("page.php?p=h_config&msg=$msg");
        exit;
    }

	do_h_config_1(
				$u,
				$pc_address					
	);

	$GLOBALS['AUTH']->t_logout();
	client_redirect("normal.php?p=h_config_mail");
}

