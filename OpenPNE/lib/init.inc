<?php
/*
 *  init.inc - 全ページ共通初期化
 */

// magic_quotes_gpc = On の場合の対策
if (get_magic_quotes_gpc()) {
	function strip_magic_slashes($arr)	{
		return is_array($arr) ?
			array_map('strip_magic_slashes', $arr) :
			stripslashes($arr);
	}
	$_GET = strip_magic_slashes($_GET);
	$_POST = strip_magic_slashes($_POST);
	$_REQUEST = strip_magic_slashes($_REQUEST);
}

//-----

// ファイルシステム上のパス
defined('DOCUMENT_ROOT') or define('DOCUMENT_ROOT', dirname(dirname(__FILE__)));

/**
 * 新規登録
 *
 * OPENPNE_REGIST_FROM_NONE  : 新規登録不可
 * OPENPNE_REGIST_FROM_PC    : PCからのみ登録可
 * OPENPNE_REGIST_FROM_KTAI  : 携帯からのみ登録可
 * OPENPNE_REGIST_FROM_PCKTAI: PC・携帯から登録可
 */
define('OPENPNE_REGIST_FROM_NONE'  , 0);
define('OPENPNE_REGIST_FROM_PC'    , 1);
define('OPENPNE_REGIST_FROM_KTAI'  , 2);
define('OPENPNE_REGIST_FROM_PCKTAI', 3);

/* 携帯メールのドメイン名 */
$GLOBALS['__OpenPNE']['KTAI_DOMAINS'] = array(
	'docomo.ne.jp',
	'ezweb.ne.jp',
	'softbank.ne.jp',
	'i.softbank.ne.jp',
	'd.vodafone.ne.jp',
	'h.vodafone.ne.jp',
	't.vodafone.ne.jp',
	'c.vodafone.ne.jp',
	'r.vodafone.ne.jp',
	'k.vodafone.ne.jp',
	'n.vodafone.ne.jp',
	'q.vodafone.ne.jp',
	's.vodafone.ne.jp',
	'pdx.ne.jp',
	'di.pdx.ne.jp',
	'dj.pdx.ne.jp',
	'dk.pdx.ne.jp',
	'wm.pdx.ne.jp',
	'me.com',
);

// Smarty の設定
$GLOBALS['__SMARTY'] = array(
	'template_dir' => DOCUMENT_ROOT . '/webapp/templates/',
	'compile_dir' => DOCUMENT_ROOT . '/var/templates_c/',
	'left_delimiter' => '({',
	'right_delimiter' => '})',
	'caching' => false,
	'debugging' => false,
	'default_modifiers' => array("@t_escape"),
	'error_reporting' => E_ALL ^ E_NOTICE ^ E_DEPRECATED,
);
$GLOBALS['__SMARTY']['plugins_dir'][] = DOCUMENT_ROOT . '/lib/smarty/plugins';
$GLOBALS['__SMARTY']['plugins_dir'][] = DOCUMENT_ROOT . '/lib/tejimaya/smarty_plugins';

/* 設定ファイルの読み込み */
require_once DOCUMENT_ROOT . "/lib/utility.inc.php";
require_once getConfigFileName();

// cookie 設定
$url = parse_url(ABSOLUTE_PATH);
session_set_cookie_params(2592000, $url['path']); // 30 days
unset($url);

ini_set("session.use_cookies", "1");
ini_set("session.use_only_cookies", "1");

// magpieRSS
define('MAGPIE_CACHE_DIR', DOCUMENT_ROOT . '/var/magpie_cache/');
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');

/* PEARライブラリのパス */
if (!defined('PEAR_DIR')) {
	define('PEAR_DIR', DOCUMENT_ROOT . "/lib/pear/");
	ini_set("include_path" , PEAR_DIR . PATH_SEPARATOR . ini_get("include_path"));
}

// ライブラリファイルの読み込み
require_once(DOCUMENT_ROOT . '/lib/tejimaya/TejimayaSmarty.inc');
require_once(DOCUMENT_ROOT . '/lib/tejimaya/Validator.class.php');
require_once(DOCUMENT_ROOT . '/lib/tejimaya/db.inc');
db_connect();

// DBから設定読み込み
db_common_load_config();

defined('ADMIN_EMAIL') or define('ADMIN_EMAIL', 'sns@'.MAIL_SERVER_DOMAIN);

// フレンド文言
defined('WORD_FRIEND') or define('WORD_FRIEND', '知り合い');
defined('WORD_FRIEND_HALF') or define('WORD_FRIEND_HALF', '知り合い');
defined('WORD_MY_FRIEND') or define('WORD_MY_FRIEND', '知り合い');
defined('WORD_MY_FRIEND_HALF') or define('WORD_MY_FRIEND_HALF', '知り合い');

// amazon
defined('AMAZON_TOKEN') or define('AMAZON_TOKEN', '');
defined('AMAZON_ACCESS_KEY') or define('AMAZON_ACCESS_KEY', '');
defined('AMAZON_AFFID') or define('AMAZON_AFFID', 'snsoftjp-22');
defined('AMAZON_LOCALE') or define('AMAZON_LOCALE', 'jp');
//defined('AMAZON_BASEURL') or define('AMAZON_BASEURL', 'http://xml-jp.amznxslt.com/onca/xml3');

// プロフィール項目 sort_order
defined('SORT_ORDER_NICK') or define('SORT_ORDER_NICK', 0);
defined('SORT_ORDER_BIRTH') or define('SORT_ORDER_BIRTH', 0);

/* framework用ライブラリ読み込み */
require_once(DOCUMENT_ROOT . '/webapp/lib/t_framework.php');

$GLOBALS['__Framework']['call_type'] = ''; // 'pc' or 'ktai' or other...
$GLOBALS['__Framework']['modules_dir'] = DOCUMENT_ROOT . '/webapp/modules';
$GLOBALS['__Framework']['current_module'] = '';
$GLOBALS['__Framework']['current_page'] = '';
//$GLOBALS['__Framework']['default_module'] = '';
$GLOBALS['__Framework']['default_page'] = '';


