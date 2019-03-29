<?php
//---------------------------------------------------------------------------
/**
設定変更
[引数]
[リダイレクト先]
[リダイレクト引数]
[権限]

*/
function doAction_h_config_3($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$rss = $request['rss'];
	$is_receive_daily_news = $request['is_receive_daily_news'];
	$is_receive_mail = $request['is_receive_mail'];
	$ashiato_mail_num= $request['ashiato_mail_num'];
	$c_member_id_block = $request['c_member_id_block'];
	$c_password_query_id = $request['c_password_query_id'];
	$c_password_query_answer = $request['c_password_query_answer'];
	$public_flag_diary = $request['public_flag_diary'];

	// ----------

	//--- 権限チェック
	//必要なし
	//---

	//rssのurlを取得
	$rss = rss_auto_get($rss);

	$c_member = db_common_c_member4c_member_id($u);
	if($rss != $c_member['rss']){
		//異なるBlogを登録すると過去のrssは全て削除する
		delete_rss_cache($u);
	}

	do_h_config_3(
				$u,
				$is_receive_mail,
				$rss,
				$ashiato_mail_num,
				$is_receive_daily_news,
				$c_password_query_id,
				$c_password_query_answer,
				$public_flag_diary
	);

	//c_rss_cacheへ登録
	insert_rss_cache($rss, $u);

	do_h_config_3_insert_c_access_block($u , $c_member_id_block);

	client_redirect("page.php?p=h_home");
}

