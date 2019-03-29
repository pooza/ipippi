<?php
/**
プロフィールを本登録

[引数]
registに必要なもの

[リダイレクト]
regist_end

[リダイレクト引数]

[権限]
登録中メンバー(セッションIDを知らされたメンバー)

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

	// --- リクエスト変数
	$sid = $requests['sid'];
	// ----------

	//--- 権限チェック
	//セッションが正しい

	if (!n_regist_intro_is_active_sid($sid)) {
		$msg = "この招待URLは既に無効になっています。";
		client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
		exit;
	}
	//---

	do_regist_prof_do_regist2_mail_send($sid);
	$c_member_id_new = do_regist_prof_do_regist($sid);

	//招待者とフレンドリンク
	$sql = "SELECT * FROM c_member_pre"
		." WHERE session='$sid'";
	$one = get_array_one4db($sql);
	$c_member_id_invite = $one['c_member_id_invite'];

	$c_member_id_from = $c_member_id_invite;
	$c_member_id_to = $c_member_id_new;

	do_common_link_friend($c_member_id_from,$c_member_id_to);

	// pre の内容を削除
	do_common_delete_c_member_pre4sid($sid);

	do_regist_prof_do_regist_mail_send($c_member_id_from , $c_member_id_to);

	client_redirect("normal.php?p=regist_end");
}
