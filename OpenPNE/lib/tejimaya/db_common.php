<?php

// DBに接続
function db_connect()
{
	@mysql_connect(
		$GLOBALS['__OpenPNE']['DSN']['hostspec'],
		$GLOBALS['__OpenPNE']['DSN']['username'],
		$GLOBALS['__OpenPNE']['DSN']['password'])
		or die('データベースサーバに接続できませんでした');
	@mysql_select_db($GLOBALS['__OpenPNE']['DSN']['database'])
		or die('データベースが見つかりませんでした');

	if (defined('USE_SET_NAMES') && USE_SET_NAMES) {
		@mysql_query('SET NAMES ujis');
	}
}

//-----

/**
 * クライアントリダイレクト
 *
 * @param	string	$destination  : ジャンプ先(相対パス)
 * @return	void
 */
function client_redirect($dest)
{
	// 改行文字を削除
	$dest = str_replace(array("\r", "\n"), "", $dest);

	header("Location: ". ABSOLUTE_PATH . $dest);
}

/**
 * クライアントリダイレクト(外部)
 *
 * @param	string	$destination  : ジャンプ先(相対パス)
 * @return	void
 */
function client_redirect_absolute($dest)
{
	// 改行文字を削除
	$dest = str_replace(array("\r", "\n"), "", $dest);

   	header("Location: ". $dest);
}

/**
 * クライアントリダイレクト(ログインページ)
 *
 * @param	string	$destination  : ジャンプ先(相対パス)
 * @return	void
 */
function client_redirect_login()
{
	client_redirect_absolute(get_login_url());
}

function get_login_url()
{
	if (defined('LOGIN_URL_PC') && LOGIN_URL_PC) {
		return LOGIN_URL_PC;
	} else {
		return ABSOLUTE_PATH . 'normal.php?p=login_do_login';
	}
}

/**
 * mysql_query を実行する
 *
 * @param  string $query
 * @return result
 */
function _mysql_query4db($query) {
	if (!($result = mysql_query($query))) {
		return false;
	}
	return $result;
}

/**
 * SQL文から結果を連想配列の配列として取り出す
 *
 * @param   string  $query
 * @return  array_of_array
 */
function get_array_list4db($query,$debug = false)
{
	if ($result = _mysql_query4db($query)) {
		$table = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$table[] = $row;
		}
		return $table;
	}
	return false;
}

/**
 * SQL文から結果を連想配列として取り出す
 * 1番目の値がkey
 * 2番目の値がvalue
 *
 * @param   string  $query
 * @return  array
 */
function get_assoc4db($query)
{
	if ($result = _mysql_query4db($query)) {
		$list = array();
		while ($row = mysql_fetch_row($result)) {
			$list[$row[0]] = $row[1];
		}
		return $list;
	}
	return false;
}

/**
 * SQL文から結果を連想配列として取り出す
 *
 * @param  string  $query
 * @return array (assoc)連想配列
 */
function get_array_one4db($query)
{
	$ret = get_array_list4db($query);
	if(!$ret) {
		return false;
	}
	return $ret[0];
}

/**
 * SQL文から結果を配列として取り出す
 *
 * @param  string $query
 * @return array
 */
function get_one_list4db($query)
{
	if ($result = _mysql_query4db($query)) {
		$list = array();
		while ($row = mysql_fetch_row($result)) {
			$list[] = $row[0];
		}
		return $list;
	}
	return false;
}

/**
 * SQL文から結果の値を1つ取り出す
 *
 * @param  string $query
 * @return mixed value
 */
function get_one4db($query)
{
	if ($result = _mysql_query4db($query)) {
		$row = mysql_fetch_row($result);
		return $row[0];
	}
	return false;
}

/**
 * SQL文からレコード追加処理をし、insert_id を返す
 *
 * @param	string $query
 * @return int insert_id  (errorのとき-1)
 */
function _insert4db($query)
{
	if (_mysql_query4db($query)) {
		$insert_id = mysql_insert_id();
		return $insert_id;
	} else {
		return -1;
	}
}

/**
画像データサイズ判定
*/
function t_get_image_size($upfile_obj){
	$upfile = $upfile_obj["tmp_name"];
	$datasize = filesize($upfile);
	return $datasize;
}

/**
画像拡張子判定
*/
function is_dirty_file($file){
	$dirty = array(
		'ade', 'adp', 'app', 'asp', 'bas', 'bat', 'cer', 'chm', 'cmd', 'com',
		'cpl', 'crt', 'csh', 'exe', 'fxp', 'hlp', 'hta', 'inf', 'ins', 'isp',
		'its', 'js', 'jse', 'ksh', 'lnk', 'mad', 'maf', 'mag', 'mam', 'maq',
		'mar', 'mas', 'mat', 'mau', 'mav', 'maw', 'mda', 'mdb', 'mde', 'mdt',
		'mdw', 'mdz', 'msc', 'msi', 'msp', 'mst', 'ops', 'pcd', 'pif', 'prf',
		'prg', 'pst', 'reg', 'scf', 'scr', 'sct', 'shb', 'shs', 'tmp', 'url',
		'vb', 'vbe', 'vbs', 'vsmacros', 'vss', 'vst', 'vsw', 'ws', 'wsc', 'wsf',
		'wsh',
		'rb', 'pl', 'py', 'cgi', 'php', 'sh', 'csh', 'tcsh', 'bash', 'zsh',
		'scpt', 'dplt',
	);
	return in_array(get_extension($file['name']), $dirty);
}

function get_extension ($name) {
	if (!$parts = explode('.', basename($name))) {
		return '';
	}
	return $parts[count($parts) - 1];
}

/**
画像フォーマット判定
*/
function t_check_image_format($upfile_obj)
{
	list($width, $height, $type, $attr) = @getimagesize($upfile_obj['tmp_name']);

	$format = false;
	switch ($type) {
	case 1:  // IMAGETYPE_GIF
		if (@imagecreatefromgif($upfile_obj['tmp_name']))	$format = 'gif';
		break;
	case 2:  // IMAGETYPE_JPEG
		if (@imagecreatefromjpeg($upfile_obj['tmp_name']))	$format = 'jpg';
		break;
	case 3:  // IMAGETYPE_PNG
		if (@imagecreatefrompng($upfile_obj['tmp_name']))	$format = 'png';
		break;
	default:
		break;
	}

	return $format;
}

/**
 * 確認画面用に一時ファイルを保存して、そのファイル名を返す
 *
 * 保存先:     var/tmp/
 * ファイル名: ($prefix)_($uid).[(jpe?g)|(gif)|(png)]
 */
function t_image_save2tmp($upfile, $uid, $prefix='', $ext='')
{
	if (!$ext) $ext = t_check_image_format($upfile);

	// 一時ファイル保存ディレクトリ
	$img_tmp_dir_path = DOCUMENT_ROOT . "/var/tmp/";

	$filename = "{$prefix}_{$uid}.{$ext}";
	$filepath = $img_tmp_dir_path . $filename;

	if (!file_exists($upfile['tmp_name']))	return false;
	if (is_dirty_file($upfile['name']))	return false;
	move_uploaded_file($upfile['tmp_name'], $filepath);
	chmod($filepath, 0644);

	if (!is_file($filepath)) return false;

	return $filename;
}

/**
 * 確認画面用の一時ファイルをすべて削除
 */
function t_image_clear_tmp($uid)
{
	$img_tmp_dir_path = DOCUMENT_ROOT . "/var/tmp/";
	$files = glob($img_tmp_dir_path . "*_{$uid}.*");
	if (is_array($files)) {
		foreach ($files as $filename) {
			unlink($filename);
		}
	}
}

function t_send_email($address, $subject, $body, $is_receive_mail=true, $from=ADMIN_EMAIL)
{
	if (!$is_receive_mail || !db_common_is_mailaddress($address)) {
		return false;
	}

	// 改行コード
	$cr = "\x0D";
	$lf = "\x0A";
	$crlf = "\x0D\x0A";

	// 設定値によりMTAに渡すヘッダの区切り記号を分ける
	if (defined('MAIL_HEADER_SEP') && MAIL_HEADER_SEP === 'CRLF') {
		$sep = $crlf;
	} else {
		$sep = $lf;
	}

	// header
	$headers = "MIME-Version: 1.0" . $sep;
	$headers .= "Content-Type: text/plain; charset=iso-2022-jp" . $sep;
	$headers .= "From: $from";

	// 半角カナを全角カナに変換
	if (defined('MAIL_HAN2ZEN') && MAIL_HAN2ZEN) {
		$subject = mb_convert_kana($subject, "KV");
		$body = mb_convert_kana($body, "KV");
	}

	// subject (改行コードを含んではならない)
	$subject = mb_convert_encoding($subject, "JIS", "EUC-JP,SJIS,UTF-8,JIS");
	$subject = str_replace(array($cr, $lf), "", $subject);
	$subject = '=?ISO-2022-JP?B?'.base64_encode($subject).'?=';

	// body (LF)
	$body = mb_convert_encoding($body, "JIS", "EUC-JP,SJIS,UTF-8,JIS");
	$body = str_replace($cr, $lf, str_replace($crlf, $lf, $body));

	mail($address, $subject, $body, $headers);
}

function _db_common_c_commu_topic_comment4c_commu_topic_comment_id($c_commu_topic_comment_id)
{
	$sql = "SELECT ctc.*, ct.name AS topic_name, c.name AS commu_name" .
		" FROM c_commu_topic_comment AS ctc, c_commu_topic AS ct, c_commu AS c" .
		" WHERE ctc.c_commu_topic_comment_id=".quote4db($c_commu_topic_comment_id) .
		" AND ct.c_commu_topic_id=ctc.c_commu_topic_id" .
		" AND c.c_commu_id=ctc.c_commu_id";
	return get_array_one4db($sql);
}

/**
 * コミュニティメールの受信アドレスリスト(携帯)
 */
function db_common_receive_ktai_address_list4c_commu_id($c_commu_id)
{
	$sql = "SELECT m.c_member_id, m.ktai_address" .
			" FROM c_member_secure AS m, c_commu_member AS cm" .
			" WHERE cm.c_commu_id = ". quote4db($c_commu_id) .
			" AND cm.is_receive_mail = 1" .
			" AND cm.c_member_id = m.c_member_id" .
			" AND m.ktai_address <> ''";
	$ktai_address_list = get_assoc4db($sql);

	foreach ($ktai_address_list as $key => $value) {
		$ktai_address_list[$key] = t_decrypt($value);
	}

	return $ktai_address_list;
}

/**
 * コミュニティメールの受信アドレスリスト(PC)
 */
function db_common_receive_pc_address_list4c_commu_id($c_commu_id)
{
	$sql = "SELECT m.pc_address" .
			" FROM c_member_secure AS m, c_commu_member AS cm" .
			" WHERE cm.c_commu_id = ". quote4db($c_commu_id) .
			" AND cm.is_receive_mail_pc = 1" .
			" AND cm.c_member_id = m.c_member_id" .
			" AND m.pc_address <> ''";
	$c_member_list = get_one_list4db($sql);

	return array_map('t_decrypt', $c_member_list);
}

function is_ktai_mail_address($mail)
{
	if (defined('DEBUG_MODE') && DEBUG_MODE) {
		//return true;
	}

	$domain = array_pop(explode('@', $mail));

	return in_array($domain, $GLOBALS['__OpenPNE']['KTAI_DOMAINS']);
}

function do_common_create_password($length = 8)
{
	// マイクロでシードを設定する
	list($usec, $sec) = explode(' ', microtime());
	$seed = (float) $sec + ((float) $usec * 100000);

	srand($seed);

	// パスワード文字列の配列を作成
	$elem = "abcdefghkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345679";
	$max = strlen($elem) - 1;

	$password = "";
	for ($i=0; $i < $length; $i++) {
		// パスワード文字列を生成
		$password .= substr($elem, rand(0, $max), 1);
	}

	return $password;
}

function db_common_friend_status($u, $target_c_member_id)
{
	$ret = array(
		'c_member'      => db_common_c_member4c_member_id($target_c_member_id),
		'is_friend'     => false,
		'is_friend_confirm' => false,
	);

	$ret['is_friend'] = _db_is_friend($u, $target_c_member_id);
	$ret['is_friend_confirm'] = do_common_is_friend_link_wait($u, $target_c_member_id);

	return $ret;
}

function db_common_commu_status($u, $target_c_commu_id)
{
	$ret = array(
		'c_commu' => p_common_c_commu4c_commu_id($target_c_commu_id),
		'is_bbs_view'     => false,
		'is_commu_member' => false,
		'is_commu_admin'  => false,
		'is_receive_mail'    => false,
		'is_commu_member_confirm' => false,
	);

	if (_db_is_c_commu_member($target_c_commu_id, $u)) {
		$ret['is_commu_member'] = true;

		$c_commu_member = _db_c_commu_member4c_member_id($u, $target_c_commu_id);
		if ($c_commu_member['is_receive_mail']) {
			$ret['is_receive_mail'] = true;
		}

		if ($ret['c_commu']['c_member_id_admin'] == $u) {
			$ret['is_commu_admin']  = true;
		}
	} else {
		if (_db_is_c_commu_member_confirm($u, $target_c_commu_id)) {
			$ret['is_commu_member_confirm'] = true;
		}
	}

	switch ($ret['c_commu']['public_flag']) {
	case "public":
	case "auth_public":
	case "auth_sns":
		$ret['is_bbs_view'] = true;
		break;
	case "auth_commu_member":
		$ret['is_bbs_view'] = $ret['is_commu_member'];
		break;
	}

	return $ret;
}

function _db_is_c_commu_member_confirm($c_member_id, $c_commu_id)
{
	$sql = "SELECT COUNT(*) FROM c_commu_member_confirm" .
		" WHERE c_member_id=" . quote4db($c_member_id) .
		" AND c_commu_id=" . quote4db($c_commu_id);
	return get_one4db($sql);
}

function _db_c_commu_member4c_member_id($c_member_id, $c_commu_id)
{
	$sql = "SELECT * FROM c_commu_member" .
			" WHERE c_member_id=". quote4db($c_member_id) .
			" AND c_commu_id=". quote4db($c_commu_id);
	return get_array_one4db($sql);
}

function handle_kengen_error()
{
	exit("アクセスできません");
}

function _do_delete_c_commu_admin_confirm2($c_commu_id,$c_member_id_to)
{
	$sql = "DELETE FROM c_commu_admin_confirm";
	$sql .= " WHERE c_commu_id=". quote4db($c_commu_id) .
			" AND c_member_id_to=". quote4db($c_member_id_to) .
			" LIMIT 1";
	return mysql_query($sql);
}

// SQLインジェクション対策用関数
function no_quote4db($str)
{
	if (defined('DB_ESCAPE_TYPE') && DB_ESCAPE_TYPE == 0) {
		return mysql_real_escape_string($str);
	} else {
		$str = mb_mb_ereg_replace('\\\\',"\\\\",$str);
		$str = mb_mb_ereg_replace('\'',"\\'",$str);
		return $str;
	}
}

function quote4db($str)
{
	if (is_null($str)) {
		return "null";
	} elseif (is_numeric($str) && strcmp(strval(intval($str)), strval($str)) == 0) {
		return intval($str);
	} else {
		return "'" . no_quote4db($str) . "'";
	}
}

function quotearray4db(/* &$str_list */)
{
	$result = array();
	foreach (func_get_args() as $str) {
		array_push($result, quote4db($str));
	}
	return implode(",", $result);
}

function &rss_extends_fetch_rss($rss_url)
{
	require_once DOCUMENT_ROOT . '/lib/magpierss/rss_fetch.inc';
	$rss = @fetch_rss($rss_url);

	if ($rss && in_array($rss->feed_type, array('RSS', 'ATOM'))) {
		return $rss;
	} else {
		return false;
	}
}

// RSS
function rss_get_new($rss_url, $limit_item = 10)
{
	if (!$rss_url) return array();

	if (!$rss = rss_extends_fetch_rss($rss_url)) {
		return array();
	}

	$item_list = array();
	$i = 0;
	foreach ($rss->items as $item) {
		if ($i >= $limit_item) break;

		switch ($rss->feed_type) {
		case 'RSS':
			if ($rss->feed_version >= 2 && !empty($item['pubdate'])) {
				$datetime_raw = $item['pubdate'];
			} else {
				$datetime_raw = $item['dc']['date'];
			}
			break;
		case 'Atom':
			$datetime_raw = $item['created'];
			break;
		}
		if (!$datetime_raw) continue;

		if (($timestamp = parse_w3cdtf($datetime_raw)) == -1) {
			$timestamp = strtotime($datetime_raw);
		}
		$r_datetime = date("Y-m-d H:i:s", $timestamp);

		$myitem = array(
			"subject"    => $item['title'],
			"body"       => $item['description'],
			"link"       => $item['link'],
			"r_datetime" => $r_datetime,
		);

		$myitem['subject'] = mb_convert_encoding($myitem['subject'], "EUC-JP", "auto");
		$myitem['body']    = mb_convert_encoding($myitem['body'], "EUC-JP", "auto");

		$item_list[$i++] = $myitem;
	}

	return $item_list;
}

function rss_auto_get($url)
{
	if (!$url) return '';
	if (rss_extends_fetch_rss($url)) return $url;

	require_once DOCUMENT_ROOT . '/lib/magpierss/rss_fetch.inc';
	$resp = _fetch_remote_file($url);
	if (is_success($resp->status)) {
		if ($rss_url = rss_auto_discovery($resp->results, $url)) {
			if (rss_extends_fetch_rss($rss_url)) return $rss_url;
		}
	}

	return '';
}

/**
 * RSS/Atom Auto-Discovery に対応したlinkタグからURLを抽出する
 *
 * @param string $html	HTML文字列
 * @param string $url	取得元URL(相対パス→絶対パス変換用)
 * @return string	抽出したURL(失敗した場合は false)
 */
function rss_auto_discovery($html, $url)
{
	if (!$html) return false;

	$target_keys = array('rel', 'type', 'href');
	$rss_types = array('application/rss+xml', 'application/atom+xml');

	// 改行を半角スペースに変換
	$html = str_replace("\n", " ", $html);
	$html = str_replace("\r", " ", $html);

	$matches = array();
	if (!preg_match_all('|<link(.+?)/|i', $html, $matches)) {
		return false;
	}
	$link_tags = $matches[1];

	foreach ($link_tags as $content) {
		$link = array();

		$attrs = preg_split('/\s+/', trim($content));
		foreach ($attrs as $attr) {
			$pieces = explode("=", $attr, 2);
			if (!is_array($pieces)) continue;

			$key = trim($pieces[0]);
			$key = strtolower($key);
			if (!in_array($key, $target_keys)) continue;

			$value = trim($pieces[1]);
			$value = str_replace("'", "", $value);
			$value = str_replace("\"", "", $value);

			$link[$key] = $value;
		}

		if (empty($link['rel']) || empty($link['type']) || empty($link['href']))
			continue;

		$rel  = strtolower($link['rel']);
		$type = strtolower($link['type']);
		$href = $link['href'];

		if ($rel == 'alternate' && in_array($type, $rss_types)) {
			if (preg_match('|^https?://|', $href)) {  // 絶対パス
				return $href;
			} else {
				require_once PEAR_DIR . 'Net/URL.php';

				$base_url = preg_replace('|/[^/]*$|', '/', $url);
				$obj_url = new Net_URL($base_url);

				if ($href{0} === '/') $obj_url->path = '';
				$obj_url->path = $obj_url->resolvePath($obj_url->path . $href);

				return $obj_url->getURL();
			}
		}
	}

	return false;
}

function db_c_member_list4exists_rss()
{
	$sql = "SELECT * FROM c_member WHERE rss != ''";
	return get_array_list4db($sql);
}

function db_insert_c_rss_cache($c_member_id, $item)
{
	$params = array(
		"c_member_id" => $c_member_id,
		"subject"     => $item['subject'],
		"body"        => $item['body'],
		"r_datetime"  => $item['r_datetime'],
		"link"        => $item['link'],
		"cache_date"  => date("Y-m-d H:i:s"),
	);

	$keys   = array_keys($params);
	$values = array_map("quote4db", array_values($params));

	$keys   = implode(",", $keys);
	$values = implode(",", $values);

	$sql = "INSERT INTO c_rss_cache($keys)"." VALUES($values)";
	return _insert4db($sql);
}

function db_update_c_rss_cache($c_rss_cache_id, $item)
{
	$params = array(
		"subject"     => $item['subject'],
		"body"        => $item['body'],
		"r_datetime"  => $item['r_datetime'],
		"cache_date"  => date("Y-m-d H:i:s"),
	);

	$sets = array();
	foreach ($params as $key => $value) {
		$sets[] = "{$key}=". quote4db($value);
	}
	$sets = implode(",", $sets);

	$sql = "UPDATE c_rss_cache" .
		" SET {$sets}".
		" WHERE c_rss_cache_id=". quote4db($c_rss_cache_id);
	return _mysql_query4db($sql);
}

function db_is_duplicated_rss_cache($c_member_id, $item)
{
	$sql = "SELECT count(*) FROM c_rss_cache" .
		" WHERE c_member_id = " . quote4db($c_member_id) .
		" AND r_datetime = " . quote4db($item['r_datetime']) .
		" AND link = " . quote4db($item['link']) .
		" LIMIT 1";
	return get_one4db($sql);
}

function db_is_future_rss_item($item)
{
	$item_timestamp = strtotime($item['r_datetime']);
	return ($item_timestamp > time());
}

function db_is_updated_rss_cache($c_member_id, $item)
{
	$sql = "SELECT c_rss_cache_id FROM c_rss_cache" .
		" WHERE c_member_id = " . quote4db($c_member_id) .
//        " AND r_datetime = " . quote4db($item['r_datetime']) .
		" AND link = " . quote4db($item['link']) .
		" LIMIT 1";
	return get_one4db($sql);
}

function db_delete_c_rss_cache4c_member_id($c_member_id)
{
	$sql = "DELETE FROM c_rss_cache WHERE c_member_id=". quote4db($c_member_id);
	_mysql_query4db($sql);
}
function db_c_member_list4no_exists_rss()
{
	$sql = "SELECT * FROM c_member WHERE rss = ''";
	return get_array_list4db($sql);
}

function image_insert_c_image4tmp($filename, $tmpfile)
{
	if (!$tmpfile || preg_match('/[^\.\w]/', $tmpfile)) return false;

	$img_tmp_dir_path = DOCUMENT_ROOT . "/var/tmp/";
	$filepath = $img_tmp_dir_path . basename($tmpfile);

	$path_parts = pathinfo($tmpfile);
	$ext = $path_parts["extension"];
	$ext = strtolower($ext);

	$allowed_ext = array('jpg', 'jpeg', 'gif', 'png');
	if (in_array($ext, $allowed_ext)) {
		$filename = $filename."_".time().".".$ext;
		if (_do_insert_c_image($filename, $filepath) > 0) {
			return $filename;
		}
	}
	return false;
}

function file_upload2var($tmpfile, $name, $c_commu_topic_id)
{
	if (!$tmpfile || preg_match('/[^\.\w]/', $tmpfile)) return false;

	$img_tmp_dir_path = DOCUMENT_ROOT . "/var/tmp/";
	$filepath = $img_tmp_dir_path . basename($tmpfile);

	$dest_dir = DOCUMENT_ROOT . '/var/file/' . sprintf("%010d", $c_commu_topic_id);
	if (!is_dir($dest_dir)) {
		mkdir($dest_dir);
	}
	$filepath_dest = $dest_dir . '/' . md5($name);

	$path_parts = pathinfo($tmpfile);
	$ext = $path_parts["extension"];
	$ext = strtolower($ext);

	if (!is_dirty_file($name)) {
		rename($filepath, $filepath_dest);
	}
}

function image_data_delete($image_filename)
{
	if(!$image_filename) return false;

	$sql = "DELETE FROM c_image" .
		" WHERE filename = " . quote4db($image_filename);
	_mysql_query4db($sql);

	// cacheの削除
	image_cache_delete($image_filename);
}

function image_cache_delete($image_filename)
{
	$img_dir = DOCUMENT_ROOT . "/webapp/lib/img/";
	require_once($img_dir . 'img.config.php');
	$cache_dir = $IMG_CONFIG['config_cache_source_directory'];
	$cache_filename = 'img_cache_' . str_replace('.', '_', $image_filename);

	foreach (glob($cache_dir.'jpg/w*_h*', GLOB_ONLYDIR) as $dir) {
		$path = $dir . '/' . $cache_filename . '.jpg';
		if (file_exists($path))	unlink($path);
	}
	foreach (glob($cache_dir.'gif/w*_h*', GLOB_ONLYDIR) as $dir) {
		$path = $dir . '/' . $cache_filename . '.gif';
		if (file_exists($path))	unlink($path);
	}
	foreach (glob($cache_dir.'png/w*_h*', GLOB_ONLYDIR) as $dir) {
		$path = $dir . '/' . $cache_filename . '.png';
		if (file_exists($path))	unlink($path);
	}
}

function image_insert_c_image($upfile_obj, $filename){
	if(!$upfile_obj) return false;

	$filepath		= $upfile_obj["tmp_name"];

	$path_parts = pathinfo($upfile_obj["name"]);
	$ext = $path_parts["extension"];
	$ext = strtolower($ext);
	$filename = $filename."_".time().".".$ext;

	$result = _do_insert_c_image($filename, $filepath);
	if(!$result) print "画像の保存に失敗しました";

	return $filename;
}

function p_access_log($c_member_id, $page_name, $ktai_flag="0"){

	$target_c_member_id = $_REQUEST['target_c_member_id'];
	$target_c_commu_id = $_REQUEST['target_c_commu_id'];
	$target_c_commu_topic_id = $_REQUEST['target_c_commu_topic_id'];
	$target_c_diary_id = $_REQUEST['target_c_diary_id'];

	if(!$page_name) exit();

	$insert_item = array(
		"c_member_id"				=> $c_member_id,
		"page_name"					=> $page_name,
		"target_c_member_id"		=> $target_c_member_id,
		"target_c_commu_id"			=> $target_c_commu_id,
		"target_c_commu_topic_id"	=> $target_c_commu_topic_id,
		"target_c_diary_id"			=> $target_c_diary_id,
		"ktai_flag"					=> $ktai_flag
	);

	foreach($insert_item as $key => $value){
		if(is_null($value)) $value="";
		$insert_item[$key] = quote4db($value);
	}

	$insert_column = implode(',', array_keys($insert_item));
	$insert_value = implode(',', $insert_item);

	$sql = "insert c_access_log($insert_column, r_datetime) values($insert_value, now())";

	mysql_query($sql);

}

function message_body2inyou($string){
	if( !empty($string) ){
		//返信用に引用符をつける
		$string = "> ".$string;
		$string = str_replace ( "\r\n", "\n", $string);
		$string = str_replace ( "\r", "\n", $string);
		$string = str_replace ( "\n", "\n> ", $string);
	}

	return $string;
}

function db_common_c_member_profile_list4c_member_id($c_member_id, $public_flag = 'public')
{
	switch ($public_flag) {
	case "private":
		$flags = "'public', 'friend', 'private'";
		break;
	case "friend":
		$flags = "'public', 'friend'";
		break;
	case "public":
	default:
		$flags = "'public'";
		break;
	}

	$sql = "SELECT cp.name, cp.caption, cp.form_type, cm.value, cm.public_flag" .
			" FROM c_member_profile as cm, c_profile as cp" .
			" WHERE cm.c_member_id = ". quote4db($c_member_id).
			" AND cm.public_flag IN ($flags)" .
			" AND cm.c_profile_id = cp.c_profile_id" .
			" ORDER BY cp.sort_order, cm.c_member_profile_id";
	$profile = get_array_list4db($sql);

	$member_profile = array();
	foreach ($profile as $value) {
		$member_profile[$value['name']]['form_type'] = $value['form_type'];
		if ($value['form_type'] == 'checkbox') {
			$member_profile[$value['name']]['value'][] = $value['value'];
		} else {
			$member_profile[$value['name']]['value'] = $value['value'];
		}
		$member_profile[$value['name']]['caption'] = $value['caption'];
		$member_profile[$value['name']]['public_flag'] = $value['public_flag'];
	}

	return $member_profile;
}

function db_common_c_member_secure4c_member_id($c_member_id)
{
	$sql = "SELECT pc_address, ktai_address, regist_address, easy_access_id" .
			" FROM c_member_secure" .
			" WHERE c_member_id = " . quote4db($c_member_id) .
			" LIMIT 1";
	$c_member_secure = get_array_one4db($sql);
	if (!$c_member_secure) return array();

	return array_map('t_decrypt', $c_member_secure);
}

/**
 * メンバー情報を取得する
 *
 * @param int $c_member_id
 * @param bool $is_secure `c_member_secure`の項目を取得するかどうか
 * @param bool $with_profile `c_member_profile`の項目を取得するかどうか
 * @param string $public_flag プロフィール項目を取得する場合の公開設定(public, friend, private)
 * @return array メンバー情報
 */
function db_common_c_member4c_member_id($c_member_id, $is_secure = false, $with_profile = false, $public_flag = 'public')
{
	$sql = "SELECT * FROM c_member" .
			" WHERE c_member_id = " . quote4db($c_member_id) .
			" LIMIT 1";
	$c_member = get_array_one4db($sql);
	if (!$c_member) return array();

	if ($is_secure) {
		$c_member['secure'] = db_common_c_member_secure4c_member_id($c_member_id);
	}

	if ($with_profile) {
		$c_member['profile'] = db_common_c_member_profile_list4c_member_id($c_member_id, $public_flag);

		// public_flag_birth_year
		switch ($c_member['public_flag_birth_year']) {
		case "friend":
			if ($public_flag == 'public')
				unset($c_member['birth_year']);
			break;
		case "private":
			if ($public_flag == 'public' || $public_flag == 'friend')
				unset($c_member['birth_year']);
			break;
		}
	}

	return $c_member;
}

/**
 * メンバー情報をプロフィール付きで取得する
 * (secure情報は取得しない)
 *
 * @param int $c_member_id
 * @param string $public_flag 取得するプロフィール項目の公開レベル(public, friend, private)
 * @return array メンバー情報
 */
function db_common_c_member_with_profile($c_member_id, $public_flag = 'public')
{
	return db_common_c_member4c_member_id($c_member_id, false, true, $public_flag);
}

/**
 * メンバー情報のよく使う部分のみを取得する
 *
 * 具体的には、
 * 　メンバーID
 * 　ニックネーム
 * 　メイン画像
 * のみを取得する。
 *
 * @param int $c_member_id
 * @return array メンバー情報
 */
function db_common_c_member4c_member_id_LIGHT($c_member_id)
{
	$sql = "SELECT c_member_id, nickname, image_filename" .
			" FROM c_member" .
			" WHERE c_member_id = " . quote4db($c_member_id) .
			" LIMIT 1";
	return get_array_one4db($sql);
}

function get_crypt_blowfish()
{
	if (empty($GLOBALS['Crypt_Blowfish'])) {
		require_once(DOCUMENT_ROOT . '/lib/pear/Crypt/Blowfish.php');
		$GLOBALS['Crypt_Blowfish'] = new Crypt_Blowfish(ENCRYPT_KEY);
	}
	return $GLOBALS['Crypt_Blowfish'];
}

/**
 * 可逆的な暗号化をする
 *
 * @param string $str 平文
 * @return string 暗号文
 */
function t_encrypt($str)
{
	if (!$str) return '';

	$bf = get_crypt_blowfish();
	$str = $bf->encrypt($str);

	//base64
	$str = base64_encode($str);

	return $str;
}

/**
 * 可逆的な暗号を復号化する
 *
 * @param string $str 暗号文
 * @return string 平文
 */
function t_decrypt($str)
{
	if (!$str) return '';

	//base64
	$str = base64_decode($str);

	$bf = get_crypt_blowfish();
	return rtrim($bf->decrypt($str));
}

/**
 * パスワードが正しいかどうか認証する
 *
 * @param int $c_member_id
 * @param string $password 平文のパスワード
 * @return bool パスワードが正しいかどうか
 */
function db_common_authenticate_password($c_member_id, $password)
{
	$sql = "SELECT COUNT(c_member_id) FROM c_member_secure" .
			" WHERE c_member_id = " . quote4db($c_member_id) .
			" AND hashed_password = " . quote4db(md5($password)) .
			" LIMIT 1";
	if (get_one4db($sql)) {
		return true;
	} else {
		return false;
	}
}

function db_common_c_profile_list4null()
{
	$sql = "SELECT * FROM c_profile" .
		" WHERE 1" .
		" ORDER BY sort_order";
	return get_array_list4db($sql);
}

function db_common_c_profile_option_list4c_profile_id($c_profile_id)
{
	$sql = "SELECT * FROM c_profile_option" .
		" WHERE c_profile_id=". quote4db($c_profile_id).
		" ORDER BY sort_order";
	return get_array_list4db($sql);
}

function db_common_c_profile_list()
{
	$list = db_common_c_profile_list4null();

	$profile_list = array();
	foreach ($list as $value) {
		$profile_list[$value['name']] = $value;
		$profile_list[$value['name']]['options'] = db_common_c_profile_option_list4c_profile_id($value['c_profile_id']);
	}
	return $profile_list;
}

function db_common_is_mailaddress($value)
{
	if (preg_match('/^[^:;@,\s]+@\w[\w-.]*\.[a-zA-Z]+$/', $value)) {
		return true;
	} else {
		return false;
	}
}

/**
 * スキン・色設定用
 */
function db_select_c_sns_config(){
	$sql = "SELECT * FROM c_sns_config"
		." WHERE c_sns_config_id = '1'";
	return get_array_one4db($sql);
}

function db_common_main_image_filename_number($c_member_id)
{
	$c_member = db_common_c_member4c_member_id($c_member_id);
	if (empty($c_member['image_filename'])) {
		return 0;
	}

	if ($c_member['image_filename'] == $c_member['image_filename_1'])
		return 1;
	elseif ($c_member['image_filename'] == $c_member['image_filename_2'])
		return 2;
	elseif ($c_member['image_filename'] == $c_member['image_filename_3'])
		return 3;
	else
		return 0;
}

/**
 * 日記ページのカレンダー生成
 */
function db_common_diary_monthly_calendar($year, $month, $c_member_id)
{
	require_once(DOCUMENT_ROOT . '/lib/pear/Calendar/Month/Weekdays.php');
	$Month = new Calendar_Month_Weekdays($year, $month, 0);
	$Month->build();

	$is_diary_list = p_h_diary_is_diary_written_list4date($year, $month, $c_member_id);

	$calendar = array();
	$week = 0;
	while ($Day = $Month->fetch()) {
		if ($Day->isFirst()) $week++;

		if ($Day->isEmpty()) {
			$calendar['days'][$week][] = array();
		} else {
			$day = $Day->thisDay();
			$item = array(
				'day' => $day,
				'is_diary' => isset($is_diary_list[$day]) ? $is_diary_list[$day] : 0,
			);
			$calendar['days'][$week][] = $item;
		}
	}

	// 最初に日記を書いた日
	$sql = "SELECT r_datetime FROM c_diary" .
   		" WHERE c_member_id = " . quote4db($c_member_id) .
   		" ORDER BY r_datetime" .
   		" LIMIT 1";
	$first_datetime = get_one4db($sql);

	// 前の月、次の月
	$prev_month = $Month->prevMonth('timestamp');
	$this_month = $Month->thisMonth('timestamp');
	$next_month = $Month->nextMonth('timestamp');

	$ym = array(
		'disp_year'  => $year,
		'disp_month' => $month,
		'prev_year'  => null,
		'prev_month' => null,
		'next_year'  => null,
		'next_month' => null,
	);
	if ($first_datetime && strtotime($first_datetime) < $this_month) {
		$ym['prev_year'] = date('Y', $prev_month);
		$ym['prev_month'] = date('n', $prev_month);
	}
	if ($next_month < time()) {
		$ym['next_year'] = date('Y', $next_month);
		$ym['next_month'] = date('n', $next_month);
	}
	$calendar['ym'] = $ym;

	return $calendar;
}

/**
 * c_admin_config から設定値を読み込み
 * ひとまず定数として定義
 */
function db_common_load_config()
{
	//TODO:cf.admin - do - update_c_admin_config
	$allowed_names = array(
		'SNS_NAME', 'ADMIN_EMAIL', 'AMAZON_AFFID',
		'CATCH_COPY', 'OPERATION_COMPANY', 'COPYRIGHT',
		'IS_CLOSED_SNS', 'OPENPNE_ENABLE_PC', 'OPENPNE_ENABLE_KTAI',
		'OPENPNE_REGIST_FROM',
		'LOGIN_URL_PC', 'DISPLAY_SCHEDULE_HOME', 'DAILY_NEWS_DAY',
		'WORD_FRIEND','WORD_MY_FRIEND',
		'WORD_FRIEND_HALF','WORD_MY_FRIEND_HALF',
		'SORT_ORDER_NICK', 'SORT_ORDER_BIRTH',
	);

	$sql = "SELECT * FROM c_admin_config";
	$configs = get_array_list4db($sql);

	foreach ($configs as $config) {
		if (!in_array($config['name'], $allowed_names)) continue;

		defined($config['name']) or define($config['name'], $config['value']);
	}
}

/**
 * ユーザー退会
 */
function db_common_delete_c_member($c_member_id)
{
	//// --- 双方向パターン
	// c_access_block
	$sql = "DELETE FROM c_access_block" .
		" WHERE c_member_id = " . quote4db($c_member_id) .
		" OR c_member_id_block = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_bookmark
	$sql = "DELETE FROM c_bookmark" .
		" WHERE c_member_id_from = " . quote4db($c_member_id) .
		" OR c_member_id_to = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_friend
	$sql = "DELETE FROM c_friend" .
		" WHERE c_member_id_from = " . quote4db($c_member_id) .
		" OR c_member_id_to = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_friend_confirm
	$sql = "DELETE FROM c_friend_confirm" .
		" WHERE c_member_id_from = " . quote4db($c_member_id) .
		" OR c_member_id_to = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	//// --- 単一パターン
	// c_invite
	$sql = "DELETE FROM c_invite" .
		" WHERE c_member_id_invite = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_ktai_address_pre
	$sql = "DELETE FROM c_ktai_address_pre" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_member_ktai_pre
	$sql = "DELETE FROM c_member_ktai_pre" .
		" WHERE c_member_id_invite = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_pc_address_pre
	$sql = "DELETE FROM c_pc_address_pre" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_review_clip
	$sql = "DELETE FROM c_review_clip" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_review_comment
	$sql = "DELETE FROM c_review_comment" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_rss_cache
	$sql = "DELETE FROM c_rss_cache" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_schedule
	$sql = "DELETE FROM c_schedule" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	//// --- 特殊パターン

	///コミュニティ関連
	// c_commu_member
	$sql = "DELETE FROM c_commu_member" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_commu (画像)
	$sql = "SELECT * FROM c_commu" .
		" WHERE c_member_id_admin = " . quote4db($c_member_id);
	$c_commu_list = get_array_list4db($sql);

	foreach ($c_commu_list as $c_commu) {
		if (!_db_count_c_commu_member_list4c_commu_id($c_commu['c_commu_id'])) {
			// コミュニティ削除
			db_common_delete_c_commu($c_commu['c_commu_id']);
		}
		else {
			// 管理者交代
			// 参加日時が一番古い人
			$sql = "SELECT c_member_id FROM c_commu_member" .
				" WHERE c_commu_id=". $c_commu['c_commu_id'].
				" ORDER BY r_datetime ASC".
				" LIMIT 1";
			$new_admin_id = get_one4db($sql);
			$sql = "UPDATE c_commu" .
				" SET c_member_id_admin={$new_admin_id}" .
				" WHERE c_commu_id=". $c_commu['c_commu_id'];
			_mysql_query4db($sql);
		}
	}

	// c_commu_admin_confirm
	$sql = "DELETE FROM c_commu_admin_confirm" .
		" WHERE c_member_id_to = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_commu_member_confirm
	$sql = "DELETE FROM c_commu_member_confirm" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_commu_review
	$sql = "DELETE FROM c_commu_review" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_event_member
	$sql = "DELETE FROM c_event_member" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	///日記関連
	// c_diary (画像)
	$sql = "SELECT * FROM c_diary" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	$c_diary_list = get_array_list4db($sql);
	foreach ($c_diary_list as $c_diary) {
		image_data_delete($c_diary['image_filename1']);
		image_data_delete($c_diary['image_filename2']);
		image_data_delete($c_diary['image_filename3']);

		// c_diary_comment
		$sql = "DELETE FROM c_diary_comment" .
			" WHERE c_diary_id = " . quote4db($c_diary['c_diary_id']);
		_mysql_query4db($sql);
	}
	$sql = "DELETE FROM c_diary" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	///メンバー関連
	// c_member_pre
	$sql = "SELECT * FROM c_member_pre" .
		" WHERE c_member_id_invite = " . quote4db($c_member_id);
	$c_member_pre_list = get_array_list4db($sql);
	foreach ($c_member_pre_list as $c_member_pre) {
		// c_member_pre_profile
		$sql = "DELETE FROM c_member_pre_profile" .
			" WHERE c_member_pre_id = " . quote4db($c_member_pre['c_member_pre_id']);
		_mysql_query4db($sql);
	}
	$sql = "DELETE FROM c_member_pre" .
		" WHERE c_member_id_invite = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_member_profile
	$sql = "DELETE FROM c_member_profile" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_member_secure
	$sql = "DELETE FROM c_member_secure" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);

	// c_member (画像)
	$sql = "SELECT image_filename_1, image_filename_2, image_filename_3" .
		" FROM c_member" .
		" WHERE c_member_id = " .quote4db($c_member_id);
	$c_member = get_array_one4db($sql);
	image_data_delete($c_member['image_filename_1']);
	image_data_delete($c_member['image_filename_2']);
	image_data_delete($c_member['image_filename_3']);

	$sql = "DELETE FROM c_member" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	_mysql_query4db($sql);
}

function db_common_delete_c_commu($c_commu_id)
{
	$sql = "SELECT * FROM c_commu WHERE c_commu_id = " . quote4db($c_commu_id);
	$c_commu = get_array_one4db($sql);

	// 画像削除
	image_data_delete($c_commu['image_filename']);

	// c_commu_admin_confirm
	$sql = "DELETE FROM c_commu_admin_confirm" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);

	// c_commu_member
	$sql = "DELETE FROM c_commu_member" .
   		" WHERE c_commu_id = " . quote4db($c_commu_id);
   	_mysql_query4db($sql);

	// c_commu_member_confirm
	$sql = "DELETE FROM c_commu_member_confirm" .
   		" WHERE c_commu_id = " . quote4db($c_commu_id);
   	_mysql_query4db($sql);

   	// c_commu_review
   	$sql = "DELETE FROM c_commu_review" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);

   	///トピック関連
   	$sql = "SELECT * FROM c_commu_topic" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	$topic_list = get_array_list4db($sql);

	foreach ($topic_list as $topic) {
		// c_commu_topic_comment(画像)
		$sql = "SELECT image_filename1, image_filename2, image_filename3" .
			" FROM c_commu_topic_comment" .
			" WHERE c_commu_topic_id = " . quote4db($topic['c_commu_topic_id']);
		$topic_comment_list = get_array_list4db($sql);
		foreach ($topic_comment_list as $topic_comment) {
			image_data_delete($topic_comment['image_filename1']);
			image_data_delete($topic_comment['image_filename2']);
			image_data_delete($topic_comment['image_filename3']);
		}

		$sql = "DELETE FROM c_commu_topic_comment" .
			" WHERE c_commu_topic_id = " . quote4db($topic['c_commu_topic_id']);
		_mysql_query4db($sql);

	   	// c_event_member
   		$sql = "DELETE FROM c_event_member" .
			" WHERE c_commu_topic_id = " . quote4db($topic['c_commu_topic_id']);
		_mysql_query4db($sql);
	}

	// c_commu_topic
	$sql = "DELETE FROM c_commu_topic" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);

   	// c_commu
   	$sql = "DELETE FROM c_commu" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);
}

function t_get_user_hash($c_member_id, $length = 12)
{
	$hashed_password = k_common_hashed_password4c_member_id($c_member_id);
	$seed = strval($c_member_id) . $hashed_password;

	return substr(md5($seed), 0, $length);
}

