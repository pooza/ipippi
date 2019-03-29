<?php

class MailSNS
{
	var $mail;
	var $from;
	var $to;

	var $c_member_id;

	function MailSNS(&$mail, $from, $to)
	{
		$this->mail =& $mail;
		$this->from = $from;
		$this->to = $to;

		$this->c_member_id = do_common_c_member_id4ktai_address($this->from);
	}

	function main()
	{
		$matches = array();
		list($from_user, $from_host) = explode("@", $this->from, 2);
		list($to_user, $to_host) = explode("@", $this->to, 2);

		// from_host が携帯ドメイン以外はエラー
		if (!is_ktai_mail_address($this->from)) {
			m_debug_log("MailSNS::main() from wrong host");
			return false;
		}

		if (!$this->c_member_id) {
			// 送信者がSNSメンバーでない場合

			if (defined('IS_CLOSED_SNS') && !IS_CLOSED_SNS) {
				// get 新規登録
				if ($to_user == "get") {
					m_debug_log("MailSNS::regist_get()", PEAR_LOG_INFO);
					return $this->regist_get();
				}
			}

			m_debug_log("MailSNS::main() not found");
			return false;
		}

		// ログインアドレス通知
		if ($to_user == "get") {
			m_debug_log("MailSNS::login_get()", PEAR_LOG_INFO);
			return $this->login_get();
		}

		//---

		// コミュニティ掲示板投稿
		elseif (
			preg_match('/^t(\d+)$/', $to_user, $matches) ||
			preg_match('/^t(\d+)-([0-9a-f]{12})$/', $to_user, $matches)
		) {

			// トピックIDのチェック
			if (!$c_commu_topic_id = $matches[1]) {
				return false;
			}

			if (defined('MAIL_ADDRESS_HASHED') && MAIL_ADDRESS_HASHED) {
				if (empty($matches[2])) return false;

				// ユーザハッシュのチェック
				if ($matches[2] != t_get_user_hash($this->c_member_id)) {
					return false;
				}
			}

			m_debug_log("MailSNS::add_commu_topic_comment()", PEAR_LOG_INFO);
			return $this->add_commu_topic_comment($c_commu_topic_id);
		}

		//---

		// 日記投稿
		elseif (
			$to_user == 'blog' ||
			preg_match('/^b(\d+)-([0-9a-f]{12})$/', $to_user, $matches)
		) {

			if (defined('MAIL_ADDRESS_HASHED') && MAIL_ADDRESS_HASHED) {
				if (empty($matches[1]) || empty($matches[2])) return false;

				// ユーザIDのチェック
				if ($matches[1] != $this->c_member_id) {
					return false;
				}
				// ユーザハッシュのチェック
				if ($matches[2] != t_get_user_hash($this->c_member_id)) {
					return false;
				}
			}

			m_debug_log("MailSNS::add_diary()", PEAR_LOG_INFO);
			return $this->add_diary();
		}

		//---

		//プロフィール画像変更
		elseif (
			preg_match('/^p(\d+)$/', $to_user, $matches) ||
			preg_match('/^p(\d+)-([0-9a-f]{12})$/', $to_user, $matches)
		) {

			// ユーザIDのチェック
			if ($matches[1] != $this->c_member_id) {
				return false;
			}

			if (defined('MAIL_ADDRESS_HASHED') && MAIL_ADDRESS_HASHED) {
				if (empty($matches[2])) return false;

				// ユーザハッシュのチェック
				if ($matches[2] != t_get_user_hash($this->c_member_id)) {
					return false;
				}
			}

			m_debug_log("MailSNS::add_member_image()", PEAR_LOG_INFO);
			return $this->add_member_image();
		}

		m_debug_log("MailSNS::main() not found(member)");
		return false;
	}

	/**
	 * 新規登録のURL取得
	 */
	function regist_get()
	{
		// 招待者は c_member_id = 1 (固定)
		$c_member_id_invite = 1;

		// _pre に追加
		$session = md5(uniqid(rand(),1));
		mail_insert_c_member_ktai_pre($session, $this->from, $c_member_id_invite);

		do_common_send_mail_regist_get($session, $this->from);
		return true;
	}

	/**
	 * ログインページのURL取得
	 */
	function login_get()
	{
		do_mail_sns_login_get_mail_send($this->c_member_id, $this->from);
		return true;
	}

	/**
	 * コミュニティ掲示板投稿
	 */
	function add_commu_topic_comment($c_commu_topic_id)
	{
		if (!$topic = mail_c_commu_topic4c_commu_topic_id($c_commu_topic_id)) {
			return false;
		}

		$c_commu_id = $topic['c_commu_id'];
		if (!_db_is_c_commu_member($c_commu_id, $this->c_member_id)) {
			$this->error_mail("コミュニティに参加していないため投稿できませんでした");
			m_debug_log("MailSNS::add_commu_topic_comment() not a member");
			return false;
		}

		$body = m_get_text_body($this->mail);
		if ($body === "") {
			$this->error_mail("本文が空のため投稿できませんでした");
			m_debug_log("MailSNS::add_commu_topic_comment() body is empty");
			return false;
		}

		// 書き込みをDBに追加
		$ins_id = mail_insert_c_commu_topic_comment($c_commu_id,$topic['c_commu_topic_id'],$this->c_member_id,$body);

		// 画像保存
		if ($image_data = m_get_image($this->mail)) {
			$filename = "tc_" . $ins_id . "_" . time() . ".jpg";

			mail_insert_c_image($image_data, $filename);
			mail_update_c_commu_topic_comment_image($ins_id, $filename);
		}

		//お知らせメール送信(携帯へ)
		send_bbs_info_mail($ins_id, $this->c_member_id);
		//お知らせメール送信(PCへ)
		send_bbs_info_mail_pc($ins_id, $this->c_member_id);

		return true;
	}

	/**
	 * 日記投稿
	 */
	function add_diary()
	{
		$subject = m_get_subject($this->mail);
		$body = m_get_text_body($this->mail);

		if ($subject === "") $subject = "無題";
		if ($body === "") {
			$this->error_mail("本文が空のため投稿できませんでした");
			m_debug_log("MailSNS::add_diary() body is empty");
			return false;
		}

		if (!$ins_id = mail_insert_c_diary($this->c_member_id, $subject, $body))
			return false;

		// 画像登録
		if ($image_data = m_get_image($this->mail)) {
			$filename = "d_" . $ins_id . "_" . time() . ".jpg";

			mail_insert_c_image($image_data, $filename);
			mail_update_c_diary_image($ins_id, $filename);
		}

		return true;
	}

	/**
	 * プロフィール画像変更
	 */
	function add_member_image()
	{
		$c_member = db_common_c_member4c_member_id($this->c_member_id);

		// 登録する画像番号(1-3)を決める
		$target_number = 0;
		if ($c_member['image_filename']) {
			if (!$c_member['image_filename_1']) $target_number = 1;
			elseif (!$c_member['image_filename_2']) $target_number = 2;
			elseif (!$c_member['image_filename_3']) $target_number = 3;
			else {
				$target_number = db_common_main_image_filename_number($this->c_member_id);
			}
		}
		if (!$target_number) $target_number = 1;

		// 画像登録
		if ($image_data = m_get_image($this->mail)) {
			$filename = "m_" .$this->c_member_id."_". time() . ".jpg";

			mail_insert_c_image($image_data, $filename);
			mail_update_c_member_image($this->c_member_id, $filename, $target_number);
			return true;
		} else {
			m_debug_log("MailSNS::add_member_image() no images");
			return false;
		}
	}

	/**
	 * エラーメールをメール送信者へ返信
	 */
	function error_mail($body)
	{
		$subject = "[".SNS_NAME."]メール投稿エラー";
		t_send_email($this->from, $subject, $body);
	}
}

