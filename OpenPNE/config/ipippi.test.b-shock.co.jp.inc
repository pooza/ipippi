<?php
//// サーバー管理設定 ////

//--- 必須設定

// Web上の絶対パス(URL)
define('ABSOLUTE_PATH', 'http://ipippi.test.b-shock.co.jp/');

// MySQLサーバ設定
$GLOBALS['__OpenPNE']['DSN'] =
	array(
		'phptype'  => 'mysqli',
		'username' => 'root',
		'password' => '',
		'hostspec' => 'localhost',
		'database' => 'ipippi',
	);
// DB暗号化キー(56バイト以内のASCII文字列)
define('ENCRYPT_KEY', 'rock salt');

// メールサーバードメイン
// 携帯メール投稿の宛先などのドメイン名に使われる
define('MAIL_SERVER_DOMAIN', 'b-shock.co.jp');

//--- オプション設定

/// デバッグ、エラーハンドリング、ログ設定

error_reporting(E_ALL);
ini_set('display_errors', false);
ini_set('log_errors', true);
ini_set('error_log', 'syslog');

// Smarty の設定
//$GLOBALS['__SMARTY']['debugging'] = true;
$GLOBALS['__SMARTY']['force_compile'] = true;

// CSRF対策のエラーを通知するメールアドレス (空の場合は送信しない)
define('HAMACHI_EMAIL', '');

// アクセスログを取得するかどうか(c_access_log)
define('LOG_C_ACCESS_LOG', false);

/// セッション・クッキー設定

ini_set('session.gc_maxlifetime', 432000); // 5 days
//session_save_path('/tmp');

// PC版
// セッション生成時からの有効期限(秒) (0 の場合は無期限)
$GLOBALS['__OpenPNE']['common']['session_lifetime'] = 0;
// セッションの有効期限(秒)
$GLOBALS['__OpenPNE']['common']['session_idletime'] = 432000; // 5 days

// 携帯版
// セッション生成時からの有効期限(秒) (0 の場合は無限)
$GLOBALS['__OpenPNE']['ktai']['session_lifetime'] = 0;
// セッションの有効期限(秒)
$GLOBALS['__OpenPNE']['ktai']['session_idletime'] = 3600; // 1 hour

/// 画像変換

// ImageMagickを使う(ただし、GDも必要)
//define('USE_IMAGEMAGICK', true);

// ImageMagick の convertコマンドのパス
//define('IMGMAGICK_APP', '/usr/bin/convert');
//define('IMGMAGICK_APP', '"C:\Program Files\ImageMagick-6.2.5-Q16\convert"');

// ImageMagick のオプション(デフォルトは -resize)
//define('IMGMAGICK_OPT', "-resize");
//define('IMGMAGICK_OPT', "-thumbnail");

/// 外部RSS取得

// 一度に取得するRSSの件数
define('RSS_CACHE_LIMIT', 100);

// ニュースURL
$GLOBALS['__OpenPNE']['news'] = array(
	//"Google News" => "http://rss.akiyan.com/rss/googlenews.rss?category=topnews",
);

/// 携帯メール投稿

// 宛先アドレスをハッシュにするか
define('MAIL_ADDRESS_HASHED', true);

// 受信メールの文字コード(Content-Typeから取得できない場合に使う)
define('MAIL_FROM_ENCODING', "auto");

// メールログを取るかどうか(var/log/mail.log)
define('MAIL_DEBUG_LOG', false);

/// メール送信設定

// MTAに渡すヘッダの改行コード(LF->CRLF の自動変換が行われることへの対策)
//define('MAIL_HEADER_SEP', 'CRLF');
define('MAIL_HEADER_SEP', 'LF');

/// mbstring設定

mb_language("Japanese");

//// SNSアプリケーション設定 ////

//管理画面の初期設定項目を表示するかどうか
define('ADMIN_INIT_CONFIG', true);


