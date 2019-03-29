<?php

@ob_start();

require_once(dirname(dirname(__FILE__)) . '/lib/init.inc');

/**
 * �饤�֥���ɤ߹���
 */
require_once(PEAR_DIR . 'Mail.php');
require_once(PEAR_DIR . 'Mail/mimeDecode.php');
require_once(PEAR_DIR . 'Mail/mimePart.php');
require_once(PEAR_DIR . 'Mail/mime.php');
require_once(PEAR_DIR . 'Log.php');

require_once(DOCUMENT_ROOT . '/lib/tejimaya/db_mail.php');
require_once(DOCUMENT_ROOT . '/mail/mail_sns.php');


// ɸ�����Ϥ���᡼��ǡ������ɤ߹���
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

// �᡼��ν���
m_process_mail($raw_mail);

// �ǥХå��ѥ���¸
m_debug_log(ob_get_contents(), PEAR_LOG_DEBUG);
@ob_end_clean();

exit;



/**
 * �᡼�����
 */
function m_process_mail($raw_mail)
{
    // �᡼��Υǥ�����
    list($mail, $from, $to) = m_decode_mail($raw_mail);
    
    // for debug
    print_r($mail);
    
    if (!db_common_is_mailaddress($from) || !db_common_is_mailaddress($to)) {
    	m_debug_log('mail.php::process_mail() ERROR code 3');
    	return false;
    }
    
    list($to_user, $to_host) = explode("@", $to, 2);
    
    if ($to_host == MAIL_SERVER_DOMAIN) {
    	$mailsns =& new MailSNS($mail, $from, $to);
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
 * �᡼��Υǥ�����
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

	// "(���֥륯�����ơ������)�������
    // "hogehoge..hoge"@docomo.ne.jp
    $from = str_replace( '"', '', $from);
    $to = str_replace('"', '', $to);
    
    // <test@docomo.ne.jp> �Ȥ������ɥ쥹�ˤʤ뤳�Ȥ����롣
    //   ���ܸ� <test@docomo.ne.jp>
    // �Τ褦�ʾ���ʣ���ޥå������ǽ��������Τǡ�
    // �ޥå������Ǹ�Τ�Τ��äƤ���褦���ѹ�
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
 * Subject �����Ƥ����(��ʸ���������Ѵ�)
 */
function m_get_subject(&$mail)
{
	return isset($mail->headers['subject']) ?
				m_convert_text($mail->headers['subject']) : "";
}

/**
 * �᡼��ܥǥ�����ƥ����Ȥ����(��ʸ���������Ѵ�)
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
	$string = mb_convert_encoding($string, "EUC-JP", $from_encoding);
	
	$string = str_replace("\0", "", $string);
	$string = rtrim($string);
	$string = mb_ereg_replace('[��]+$', "", $string);
	
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
    	
         // �������ɤ��������å�
    	if (!@imagecreatefromstring($image_data)) {
	        // base64_decode���ƥ�ȥ饤
	        $image_data = base64_decode($image_data);
	        if (!@imagecreatefromstring($image_data)) return "";
    	}
    	
        // ����ե���������
        $tmpfname = tempnam(DOCUMENT_ROOT . "/var/tmp", "MAIL_");
        
        $fp = fopen($tmpfname, "wb");
        fwrite($fp, $image_data);
		fclose($fp);
		
		// �����������Υ����å�
		if (filesize($tmpfname) > 300*1024) {
			unlink($tmpfname);
			return "";
		}
		
		// Content-Type �����������ɤ��������å�
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
 * �ǥХå��ѥ���¸
 */
function m_debug_log($msg, $priority =  PEAR_LOG_WARNING)
{
	if (!MAIL_DEBUG_LOG) return;
	
	$log_path = DOCUMENT_ROOT . '/var/log/mail.log';
	$file =& Log::singleton('file', $log_path, 'MAIL');
	
	mb_convert_encoding($msg, 'JIS', 'auto');
	$file->log($msg, $priority);
}

?>