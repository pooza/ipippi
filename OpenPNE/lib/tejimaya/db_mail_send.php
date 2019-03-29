<?php

//----- 共通関数

/**
 * mailテンプレート内容をfetch
 *
 * @param string $tpl_name テンプレート名(/templates/mail 直下のファイル)
 * @param array $params Smartyでassignされる連想配列
 * @return string Smartyが出力したHTMLの文字列
 */
function fetch_mail_m_tpl($tpl_name, $params)
{
	$params["ABSOLUTE_PATH"] = ABSOLUTE_PATH;
	$params["SNS_NAME"] = SNS_NAME;
	$params["HOME_PATH"] = ABSOLUTE_PATH;
	$params["ADMIN_EMAIL"] = ADMIN_EMAIL;
	$params["CATCH_COPY"] = CATCH_COPY;
	$params["OPERATION_COMPANY"] = OPERATION_COMPANY;
	$params["COPYRIGHT"] = COPYRIGHT;

	// メールの場合はHTMLエスケープしない
	$local_configs = $GLOBALS['__SMARTY'];
	$local_configs['default_modifiers'] = array();

	$smarty = new TejimayaSmarty($local_configs);
	$smarty->assign($params);
	$smarty->assign('inc_signature', fetch_inc_signature($smarty));
	$smarty->assign('WORD_FRIEND', WORD_FRIEND);
	$smarty->assign('WORD_MY_FRIEND', WORD_MY_FRIEND);
	$smarty->assign('WORD_FRIEND_HALF', WORD_FRIEND_HALF);
	$smarty->assign('WORD_MY_FRIEND_HALF', WORD_MY_FRIEND_HALF);

	// 拡張ファイルチェック
	$tpl = 'file:' . DOCUMENT_ROOT . "/webapp/templates/ext/mail/" . $tpl_name;
	$place = 'ext';
	if (!$smarty->template_exists($tpl)) { // extディレクトリにテンプレートがあるか
		$tpl = 'file:' . DOCUMENT_ROOT . "/webapp/templates/mail/" . $tpl_name;
		$place = 'dft';
	}
	$cache_id = $compile_id = 'mail_'. $place;

	$subject_and_body = $smarty->fetch($tpl, $cache_id, $compile_id);
	return explode("\n", $subject_and_body, 2);
}

function fetch_inc_signature($smarty)
{
	// 拡張ファイルチェック
	$tpl = 'file:' . DOCUMENT_ROOT . "/webapp/templates/ext/mail/inc_signature.tpl";
	$place = 'ext';
	if (!$smarty->template_exists($tpl)) { // extディレクトリにテンプレートがあるか
		$tpl = 'file:' . DOCUMENT_ROOT . "/webapp/templates/mail/inc_signature.tpl";
		$place = 'dft';
	}
	$cache_id = $compile_id = 'mail_'. $place;
	return $smarty->fetch($tpl, $cache_id, $compile_id);
}

//-----

//本登録完了メール 招待者へ
function do_regist_prof_do_regist_mail_send($c_member_id_from , $c_member_id_to){

	$c_member = db_common_c_member4c_member_id($c_member_id_from);
	$params = array(
		"c_member"		=> $c_member,
		"target_c_member"		=> db_common_c_member4c_member_id($c_member_id_to),
	);
	list($subject, $body) = fetch_mail_m_tpl("m_pc_hontouroku_kanryou.tpl", $params);

	$pc_address = $c_member['pc_address'];
	t_send_email($pc_address,$subject,$body,true);
}

//本登録完了メール 登録者へ
function do_regist_prof_do_regist2_mail_send($sid){

	$c_member = do_common_c_member_pre4sid($sid);
	$params = array(
		"c_member"			=> $c_member,
		"sid"				=> $sid
	);
	list($subject, $body) = fetch_mail_m_tpl("m_pc_invite_end.tpl", $params);

	$pc_address = $c_member['pc_address'];
	t_send_email($pc_address,$subject,$body,true);
}

//招待メール\\\\
function do_h_invite_insert_c_inivte_mail_send($c_member_id_invite, $session, $message, $pc_address){

	$params = array(
		"c_member"		=> db_common_c_member4c_member_id($c_member_id_invite),
		"sid"			=> $session,
		"invite_message"=> $message,
	);
	list($subject, $body) = fetch_mail_m_tpl("m_pc_syoutai_mail.tpl", $params);

	t_send_email($pc_address,$subject,$body,true);
}

//パスワード再発行メール
function do_password_query_mail_send($c_member_id, $pc_address, $new_password)
{
	$params = array(
		"c_member"   => db_common_c_member4c_member_id($c_member_id),
		"pc_address" => $pc_address,
		"password"   => $new_password,
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_password_query.tpl", $params);

	t_send_email($pc_address, $subject, $body, true);
}

//パスワード再発行メール(携帯)
function db_mail_send_m_ktai_password_query($c_member_id, $new_password)
{
	$c_member = db_common_c_member4c_member_id($c_member_id, true);
	$pw = md5($new_password);

	$params = array(
		'c_member'  => $c_member,
		'password'  => $new_password,
		'login_url' => ABSOLUTE_PATH . "ktai_normal.php?p=login&kad=" . urlencode(t_encrypt($c_member['secure']['ktai_address'])),
	);

	list($subject, $body) = fetch_mail_m_tpl("m_ktai_password_query.tpl", $params);

	t_send_email($c_member['secure']['ktai_address'], $subject, $body, true);
}

//掲示板が更新されたときのお知らせメール送信(携帯メールアドレスへ)
function send_bbs_info_mail($c_commu_topic_comment_id, $c_member_id)
{
	$comment = _db_common_c_commu_topic_comment4c_commu_topic_comment_id($c_commu_topic_comment_id);
	$c_member = db_common_c_member4c_member_id_LIGHT($c_member_id);

	$c_commu_id       = $comment['c_commu_id'];
	$c_commu_topic_id = $comment['c_commu_topic_id'];
	$topic_name       = $comment['topic_name'];
	$commu_name       = $comment['commu_name'];
	$body             = $comment['body'];
	$nickname = $c_member['nickname'];

	$params = array(
		"topic_name"	=> $topic_name,
		"commu_name" 	=> $commu_name,
		"nickname" 		=> $nickname,
		"body" 			=> $body,
	);

	list($subject, $body) = fetch_mail_m_tpl("m_ktai_bbs_info.tpl", $params);

	$lst  = db_common_receive_ktai_address_list4c_commu_id($c_commu_id);
	foreach($lst as $target_c_member_id => $ktai_address) {
		if (defined('MAIL_ADDRESS_HASHED') && MAIL_ADDRESS_HASHED) {
			$from = "t{$c_commu_topic_id}-".t_get_user_hash($target_c_member_id).'@'.MAIL_SERVER_DOMAIN;
		} else {
			$from = "t{$c_commu_topic_id}".'@'.MAIL_SERVER_DOMAIN;
		}
		t_send_email($ktai_address, $subject, $body, true, $from);
	}
}

//掲示板が更新されたときのお知らせメール送信(PCメールアドレスへ)
function send_bbs_info_mail_pc($c_commu_topic_comment_id, $c_member_id)
{
	$comment = _db_common_c_commu_topic_comment4c_commu_topic_comment_id($c_commu_topic_comment_id);
	$c_member = db_common_c_member4c_member_id_LIGHT($c_member_id);

	$c_commu_id       = $comment['c_commu_id'];
	$c_commu_topic_id = $comment['c_commu_topic_id'];
	$topic_name       = $comment['topic_name'];
	$commu_name       = $comment['commu_name'];
	$body             = $comment['body'];
	$nickname = $c_member['nickname'];

	$params = array(
		"topic_name"	=> $topic_name,
		"commu_name" 	=> $commu_name,
		"nickname" 		=> $nickname,
		"body" 			=> $body,
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_bbs_info.tpl", $params);

	$lst  = db_common_receive_pc_address_list4c_commu_id($c_commu_id);
	foreach($lst as $pc_address) {
		t_send_email($pc_address, $subject, $body, true);
	}
}

//イベントのお知らせメール
function do_c_event_invite_send_mail($c_commu_id,$c_commu_topic_id,$c_member_id, $target_c_member_ids, $body){

	$member = db_common_c_member4c_member_id($c_member_id);
	$event_url = ABSOLUTE_PATH . "page.php?p=c_event_detail&target_c_commu_topic_id=$c_commu_topic_id";
	$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);

	$params = array(
//		"targetr_name"	=> "",
		"nickname"		=> $member['nickname'],
		"event_name"	=> $c_topic['name'],
		"body"			=> $body,
		"event_url"		=> $event_url,
	);

	foreach($target_c_member_ids as $value){
		$target_member = db_common_c_member4c_member_id($value);
		$params['target_name'] = $target_member['nickname'];

		list($subject, $body) = fetch_mail_m_tpl("m_pc_event_invite_mail.tpl", $params);

		$target_member_secure = db_common_c_member_secure4c_member_id($value);
		$pc_address = $target_member_secure['pc_address'];

		t_send_email($pc_address, $subject, $body);
	}
}

//イベントの一括送信
function do_c_event_mail_send_mail($c_commu_id,$c_commu_topic_id,$c_member_id, $target_c_member_ids, $subject, $body){
	$member = db_common_c_member4c_member_id($c_member_id);
	$event_url = ABSOLUTE_PATH . "page.php?p=c_event_detail&target_c_commu_topic_id=$c_commu_topic_id";

	$params = array(
		"nickname"  => $member['nickname'],
		"body"      => $body,
		"event_url" => $event_url,
	);
	list($subject, $body) = fetch_mail_m_tpl("m_pc_event_mail.tpl", $params);

	foreach($target_c_member_ids as $value){
		$target_member_secure = db_common_c_member_secure4c_member_id($value);
		$pc_address = $target_member_secure['pc_address'];

		t_send_email($pc_address, $subject, $body);
	}
}

//デイリーニュース
function do_common_send_daily_news(){

	$list = do_common_c_member_list4null();
	$send_2_flag = 0;
	$day_arr = array('日','月','火','水','木','金','土');
	$day = date('w');
	if(strstr(DAILY_NEWS_DAY, $day_arr[$day])) $send_2_flag = 1;

	foreach($list as $key => $value){
		if($value['is_receive_daily_news']==1 || ($value['is_receive_daily_news']==2 && $send_2_flag)){
			$date = date("Y. n. j");     // 2001. 3. 10
			$c_member_id = $value['c_member_id'];
			print "c_member_id=".$c_member_id."<BR>\n";

			$c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
			$pc_address = $c_member_secure['pc_address'];

			$params = array(
				"c_member"			=> db_common_c_member4c_member_id($c_member_id),
				"date"				=> $date,
				"ashiato_num"		=> p_h_ashiato_c_ashiato_num4c_member_id($c_member_id),
				"diary_friend_list"	=> p_h_home_c_diary_friend_list4c_member_id($c_member_id,5),
				"c_commu_topic_comment_list"
									=> p_h_home_c_commu_topic_comment_list4c_member_id($c_member_id, 5),
			);

			list($subject, $body) = fetch_mail_m_tpl("m_pc_daily_news.tpl", $params);

			t_send_email($pc_address,$subject,$body);

		}
	}
}

//誕生日メール
function do_common_send_birthday_mail()
{
	$birth_list = do_common_c_member_list4birthday();

	foreach($birth_list as $birth_member) {
		$friend_list = do_common_c_friend_list4c_member_id($birth_member['c_member_id']);

		foreach($friend_list as $friend) {
			if ($friend['is_receive_mail']) {

				$c_member_secure = db_common_c_member_secure4c_member_id($friend['c_member_id']);
				$pc_address = $c_member_secure['pc_address'];

				$params = array(
					"birth_member" => $birth_member,
					"friend" => $friend,
				);
				list($subject, $body) = fetch_mail_m_tpl("m_pc_birthday_mail.tpl", $params);

				t_send_email($pc_address, $subject, $body);
			}
		}
	}
}

//スケジュールメール
function do_common_send_schedule_mail()
{
	$date = date('Y-m-d');
	$sql = "SELECT * FROM c_schedule " .
		" WHERE start_date='{$date}'" .
		" AND is_receive_mail=1";

	$c_schedule_list = get_array_list4db($sql);

	$send_list = array();
	foreach ($c_schedule_list as $value) {
		$c_member_id = $value['c_member_id'];
		$send_list[$c_member_id][] = $value;
	}

	foreach ($send_list as $key => $value) {
		$c_member_secure = db_common_c_member_secure4c_member_id($key);

		$params = array(
			"c_member" => db_common_c_member4c_member_id_LIGHT($key),
			"c_schedule_list" => $value,
		);
		list($subject, $body) = fetch_mail_m_tpl("m_pc_schedule_mail.tpl", $params);

		t_send_email($c_member_secure['pc_address'], $subject, $body);
	}
}

//◆紹介文が編集されました！メール
function do_f_intro_edit_update_c_friend_send_mail($c_member_id, $target_c_member_id){

	$c_member_to = db_common_c_member4c_member_id($target_c_member_id, true);
	$pc_address = $c_member_to['secure']['pc_address'];
	$is_receive_mail = $c_member_to['is_receive_mail'];

	$params = array(
		"c_member_to" 	=> db_common_c_member4c_member_id_LIGHT($target_c_member_id),
		"c_member_from"	=> db_common_c_member4c_member_id_LIGHT($c_member_id),
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_friend_intro.tpl", $params);

	t_send_email($pc_address,$subject,$body,$is_receive_mail);

}

//コミュニティに参加したときのメール
function do_inc_join_c_commu_send_mail($c_commu_id, $c_member_id_join)
{
	$c_commu = do_common_c_commu4c_commu_id($c_commu_id);

	$params = array(
		'c_commu' => $c_commu,
		'c_member_admin' => db_common_c_member4c_member_id_LIGHT($c_commu['c_member_id_admin']),
		'c_member_join'  => db_common_c_member4c_member_id_LIGHT($c_member_id_join),
	);
	list($subject, $body) = fetch_mail_m_tpl("m_pc_join_commu.tpl", $params);

	$c_member_admin = db_common_c_member4c_member_id($c_commu['c_member_id_admin'], true);

	$pc_address = $c_member_admin['secure']['pc_address'];
	$is_receive_mail = ($c_member_admin['is_receive_mail'] && $c_commu['is_send_join_mail']);

	t_send_email($pc_address, $subject, $body, $is_receive_mail);
}

//◆友達リンク承認完了メール
function do_h_confirm_list_insert_c_friend_mail_send($c_member_id_from, $u){

	$c_member_from = db_common_c_member4c_member_id($c_member_id_from, true);
	$pc_address = $c_member_from['secure']['pc_address'];
	$is_receive_mail = $c_member_from['is_receive_mail'];

	$params = array(
		"c_member_to"	=> db_common_c_member4c_member_id($c_member_id_from),
		"c_member_from"	=> db_common_c_member4c_member_id($u),
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_syounin_friend.tpl", $params);

	t_send_email($pc_address,$subject,$body,$is_receive_mail);
}

//メールアドレス変更メール
function do_h_config_1_mail_send($target_c_member_id, $session, $pc_address){
	$params = array(
		"c_member" 			=> db_common_c_member4c_member_id($target_c_member_id),
		"sid"				=> $session,
	);
	list($subject, $body) = fetch_mail_m_tpl("m_pc_change_mail.tpl", $params);

	t_send_email($pc_address,$subject,$body,true);
}

//あしあとお知らせメール
function do_common_send_ashiato_mail($c_member_to,$c_member_from){

	$c_member_to_list = db_common_c_member4c_member_id($c_member_to, true);
	$c_member_from_list = db_common_c_member4c_member_id($c_member_from);

	$pc_address = $c_member_to_list['secure']['pc_address'];

	$params = array(
		"c_member_to" => $c_member_to_list,
		"c_member_from" => $c_member_from_list,
	);
	list($subject, $body) = fetch_mail_m_tpl("m_pc_ashiato.tpl", $params);

	t_send_email($pc_address,$subject,$body);
}

//◆メッセージ受信メール
function do_common_send_message_mail_send($c_member_id_to, $c_member_id_from){
	$c_member_to = db_common_c_member4c_member_id($c_member_id_to, true);
	$pc_address = $c_member_to['secure']['pc_address'];
	$is_receive_mail = $c_member_to['is_receive_mail'];

	$params = array(
		"c_member_to"   => db_common_c_member4c_member_id($c_member_id_to),
		"c_member_from" => db_common_c_member4c_member_id($c_member_id_from),
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_message_zyushin.tpl", $params);

	t_send_email($pc_address,$subject,$body,$is_receive_mail);
}

//◆承認依頼メッセージ受信メール
function do_common_send_message_syoudaku_mail_send($c_member_id_to, $c_member_id_from){
	$c_member_to = db_common_c_member4c_member_id($c_member_id_to, true);
	$pc_address = $c_member_to['secure']['pc_address'];
	$is_receive_mail = $c_member_to['is_receive_mail'];

	$params = array(
		"c_member_to"	=> db_common_c_member4c_member_id($c_member_id_to),
		"c_member_from"	=> db_common_c_member4c_member_id($c_member_id_from),
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_message_syounin.tpl", $params);

	t_send_email($pc_address,$subject,$body,$is_receive_mail);

}

// ログインアドレス通知メール
function do_insert_c_member_mail_send($c_member_id, $password, $ktai_address)
{
	$c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
	$params['url'] = ABSOLUTE_PATH . "ktai_normal.php?p=login".
			"&kad=".urlencode(t_encrypt($c_member_secure['ktai_address']));
	list($subject, $body) = fetch_mail_m_tpl("m_ktai_login_regist_end.tpl", $params);

	t_send_email($ktai_address, $subject, $body);

}

//招待されたときのメール(ktai)
function h_invite_insert_c_invite_mail_send($session, $c_member_id_invite, $mail, $message)
{
	$params['SNS_NAME'] = SNS_NAME;
	$params['url'] = ABSOLUTE_PATH . "ktai_normal.php?p=regist_pre&ses={$session}";
	$params['c_member'] = db_common_c_member4c_member_id($c_member_id_invite);
	$params['message'] = $message;
	list($subject, $body) = fetch_mail_m_tpl("m_ktai_regist_invite.tpl", $params);

	t_send_email($mail, $subject, $body);
}

//メールアドレスの変更および
//PCで今まで使っていたユーザーが新たに携帯アドレスを登録したときに送られるメール
function do_mail_sns_change_ktai_mail_send($c_member_id, $session, $ktai_address)
{
	$params['SNS_NAME'] = SNS_NAME;
	$params['url'] = ABSOLUTE_PATH . "ktai_normal.php?p=login2&id={$c_member_id}&ses={$session}";
	list($subject, $body) = fetch_mail_m_tpl("m_ktai_change_ktai.tpl", $params);

	t_send_email($ktai_address, $subject, $body);
}

//ログインアドレス通知メール
function do_mail_sns_login_get_mail_send($c_member_id, $sender){
	$c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
	$params['url'] = ABSOLUTE_PATH . "ktai_normal.php?p=login".
			"&kad=".urlencode(t_encrypt($c_member_secure['ktai_address']));
	list($subject, $body) = fetch_mail_m_tpl("m_ktai_login_get.tpl", $params);

	t_send_email($sender, $subject, $body);
}

// コミュニティ紹介
function do_common_send_message_syoukai_commu_mail_send($c_member_id_to, $c_member_id_from)
{
	//メール
	$c_member_to = db_common_c_member4c_member_id($c_member_id_to, true);
	$pc_address = $c_member_to['secure']['pc_address'];
	$is_receive_mail = $c_member_to['is_receive_mail'];

	$params = array(
		"c_member_to"	=>db_common_c_member4c_member_id($c_member_id_to),
		"c_member_from"	=>db_common_c_member4c_member_id($c_member_id_from),
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_message_syoukai_commu.tpl", $params);

	t_send_email($pc_address,$subject,$body,$is_receive_mail);
}

// メンバ紹介
function do_common_send_message_syoukai_member_mail_send($c_member_id_to, $c_member_id_from)
{
	//メール
	$c_member_to = db_common_c_member4c_member_id($c_member_id_to, true);
	$pc_address = $c_member_to['secure']['pc_address'];
	$is_receive_mail = $c_member_to['is_receive_mail'];

	$params = array(
		"c_member_to"	=> db_common_c_member4c_member_id($c_member_id_to),
		"c_member_from"	=> db_common_c_member4c_member_id($c_member_id_from),
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_message_syoukai_member.tpl", $params);

	t_send_email($pc_address,$subject,$body,$is_receive_mail);
}

function do_common_send_mail_regist_get($session, $sender)
{
	// メール送信
	$params['url'] = ABSOLUTE_PATH . "ktai_normal.php?p=regist_pre&ses={$session}";
	list($subject, $body) = fetch_mail_m_tpl("m_ktai_regist_get.tpl", $params);

	t_send_email($sender, $subject, $body);
}

//退会完了メール(PC)
function do_common_send_mail_taikai_end_pc($c_member_id)
{
	$c_member = db_common_c_member4c_member_id($c_member_id, true);
	$params = array(
		"c_member"		=> $c_member,
	);

	list($subject, $body) = fetch_mail_m_tpl("m_pc_taikai_end.tpl", $params);
	t_send_email($c_member['secure']['pc_address'], $subject, $body);
}

//退会完了メール(携帯)
function do_common_send_mail_taikai_end_ktai($c_member_id)
{
	$c_member = db_common_c_member4c_member_id($c_member_id, true);
	$params = array(
		"c_member"		=> $c_member,
	);

	list($subject, $body) = fetch_mail_m_tpl("m_ktai_taikai_end.tpl", $params);
	t_send_email($c_member['secure']['ktai_address'], $subject, $body);
}

