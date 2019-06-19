<?php

@ob_start();

require_once(dirname(dirname(__FILE__)) . '/lib/init.inc');

/**
 * ライブラリ読み込み
 */
require_once(PEAR_DIR . 'Mail.php');
require_once(PEAR_DIR . 'Mail/mimeDecode.php');
require_once(PEAR_DIR . 'Mail/mimePart.php');
require_once(PEAR_DIR . 'Mail/mime.php');
require_once(PEAR_DIR . 'Log.php');

require_once(DOCUMENT_ROOT . '/lib/tejimaya/db_mail.php');
require_once(DOCUMENT_ROOT . '/mail/mail_sns.php');

// 標準入力からメールデータの読み込み
$stdin = fopen("php://stdin", "rb");
$raw_mail = "";
do {
	$data = fread($stdin, 8192);
	if(strlen($data) == 0) {
		break;
	}
	$raw_mail .= $data;
} while(true);
fclose($stdin);

// メールの処理
m_process_mail($raw_mail);

// デバッグ用ログ保存
m_debug_log(ob_get_contents(), PEAR_LOG_DEBUG);
@ob_end_clean();

exit;

/**
 * メール処理
 */
function m_process_mail($raw_mail)
{
	// メールのデコード
	list($mail, $from, $to) = m_decode_mail($raw_mail);

	// for debug
	print_r($mail);

	if (!db_common_is_mailaddress($from) || !db_common_is_mailaddress($to)) {
		m_debug_log('mail.php::process_mail() ERROR code 3');
		return false;
	}

	list($to_user, $to_host) = explode("@", $to, 2);

	if ($to_host == MAIL_SERVER_DOMAIN) {
		$mailsns = new MailSNS($mail, $from, $to);
		if (!$mailsns->main()) {
			m_debug_log('mail.php::process_mail() ERROR code 1');
			return false;
		}
	} else {
		m_debug_log('mail.php::process_mail() ERROR code 2');
		return false;
	}

	return true;
}

/**
 * メールのデコード
 */
function m_decode_mail($raw_mail)
{
	$params['include_bodies'] = true;
	$params['decode_bodies']  = true;
	$params['decode_headers'] = true;

	$decoder = new Mail_mimeDecode($raw_mail);
	$mail = $decoder->decode($params);

	$from = $mail->headers['from'];
	$to = $mail->headers['to'];

	// "(ダブルクォーテーション)を取り除く
	// "hogehoge..hoge"@docomo.ne.jp
	$from = str_replace( '"', '', $from);
	$to = str_replace('"', '', $to);

	// <test@docomo.ne.jp> というアドレスになることがある。
	//   日本語 <test@docomo.ne.jp>
	// のような場合に複数マッチする可能性があるので、
	// マッチした最後のものを取ってくるように変更
	$matches = array();
	$regx = '/([\.\w!#$%&\'*+-\/=?^`{|}~]+@[\w!#$%&\'*+-\/=?^`{|}~]+(\.[\w!#$%&\'*+-\/=?^`{|}~]+)*)/';
	if (preg_match_all($regx, $from, $matches)) {
		$from = array_pop($matches[1]);
	} else {
		$from = '';
	}
	if (preg_match_all($regx, $to, $matches)) {
		$to = array_pop($matches[1]);
	} else {
		$to = '';
	}

	return array($mail, $from, $to);
}

/**
 * Subject の内容を抽出(＋文字コード変換)
 */
function m_get_subject(&$mail)
{
	return isset($mail->headers['subject']) ?
				m_convert_text($mail->headers['subject']) : "";
}

/**
 * メールボディからテキストを抽出(＋文字コード変換)
 */
function m_get_text_body(&$mail)
{
	$body = "";

	if (isset($mail->parts) && is_array($mail->parts)) {   // multipart
		foreach ($mail->parts as $part) {
			if ($body = m_get_text_body($part)) break;
		}
	}
	elseif ($mail->ctype_primary === "text") {
		$body = $mail->body;
		$charset = $mail->ctype_parameters['charset'];

		$body = m_convert_text($body, $charset);
	}

	return $body;
}

function m_convert_text($string, $from_encoding = "")
{
	if (!$from_encoding) {
		if (defined('MAIL_FROM_ENCODING') && MAIL_FROM_ENCODING)
			$from_encoding = MAIL_FROM_ENCODING;
		else
			$from_encoding = "auto";
	}
	$string = mb_convert_encoding($string, "utf-8", $from_encoding);

	$string = str_replace("\0", "", $string);
	$string = rtrim($string);
	$string = mb_ereg_replace('[　]+$', "", $string);

	return $string;
}

function m_get_image(&$mail)
{
	$allowed_type = array("jpeg", "gif", "png");
	$image_data = "";

	if (isset($mail->parts) && is_array($mail->parts)) {   // multipart
		foreach ($mail->parts as $part) {
			if ($image_data = m_get_image($part)) break;
		}
	}
	elseif ($mail->ctype_primary === "image" &&
			 in_array($mail->ctype_secondary, $allowed_type)) {
		$image_data = $mail->body;

		 // 画像かどうかチェック
		if (!@imagecreatefromstring($image_data)) {
			// base64_decodeしてリトライ
			$image_data = base64_decode($image_data);
			if (!@imagecreatefromstring($image_data)) return "";
		}

		// 一時ファイルを作成
		$tmpfname = tempnam(DOCUMENT_ROOT . "/var/tmp", "MAIL_");

		$fp = fopen($tmpfname, "wb");
		fwrite($fp, $image_data);
		fclose($fp);

		// 画像サイズのチェック
		if (filesize($tmpfname) > 300*1024) {
			unlink($tmpfname);
			return "";
		}

		// Content-Type が正しいかどうかチェック
		switch ($mail->ctype_secondary) {
		case "jpeg":
			if (!@imagecreatefromjpeg($tmpfname)) $image_data = "";
			break;
		case "gif":
			if (!@imagecreatefromgif($tmpfname)) $image_data = "";
			break;
		case "png":
			if (!@imagecreatefrompng($tmpfname)) $image_data = "";
			break;
		}

		unlink($tmpfname);
	}

	return $image_data;
}

/**
 * デバッグ用ログ保存
 */
function m_debug_log($msg, $priority =  PEAR_LOG_WARNING)
{
	if (!MAIL_DEBUG_LOG) return;

	$log_path = DOCUMENT_ROOT . '/var/log/mail.log';
	$file = Log::singleton('file', $log_path, 'MAIL');

	mb_convert_encoding($msg, 'utf-8', 'auto');
	$file->log($msg, $priority);
}

