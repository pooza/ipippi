<?php
require_once "../../OpenPNE/lib/init.inc";

//-------------config-------------//
// 一度に取得するRSSの件数
$rss_num = 100;
if (defined('RSS_CACHE_LIMIT') && intval(RSS_CACHE_LIMIT) > 0)
	$rss_num = intval(RSS_CACHE_LIMIT);

// 最後に取得したメンバーのIDを格納するファイル
$log = DOCUMENT_ROOT . "/var/log/rss_cache.log";

//RSS設定が空のメンバーに対してDELETE文を発行するか
$is_delete = false;
//ログ出力をするか
define('RSS_CACHE_DISPLAY_LOG', true);
//-------------config-------------//

$start_id = $end_id = 0;

// 前回最後にRSS取得したメンバのID取得
if ($f = fopen($log, "r+")) {
	if (flock($f, LOCK_EX)){
		$start_id = intval(fread($f, 11));
	}
}

// rss のURLが入っている人を抽出
$c_member_list = db_c_member_list4exists_rssAc_member_id($start_id, $rss_num);
if ($c_member_list) {
	$lastone = end($c_member_list);
	$end_id = $lastone['c_member_id'];

	if (count($c_member_list) < $rss_num) {
		$end_id = 0;
	}
}

// 今回取得する最後のメンバIDを記録
if ($f) {
	rewind($f);
	ftruncate($f, fwrite($f, $end_id));

	flock($f, LOCK_UN);
	fclose($f);
}

foreach ($c_member_list as $c_member) {
	_log('get', $c_member['c_member_id']);
	$rss_item_list = rss_get_new($c_member['rss']);

	$insert_rss_list = array();
	foreach ($rss_item_list as $item) {
		// DBに存在するデータが見つかったら以降は比較、取得は行わない
		if (db_is_duplicated_rss_cache($c_member['c_member_id'], $item)) break;

		if (!db_is_future_rss_item($item)) {
			if ($id = db_is_updated_rss_cache($c_member['c_member_id'], $item)) {
				// update
				db_update_c_rss_cache($id, $item);
			} else {
				// insert
				$insert_rss_list[] = $item;
			}
		}
	}

	_log('insert', count($insert_rss_list) . " records");
	db_insert_c_rss_cache_list($c_member['c_member_id'], $insert_rss_list);
}

// RSS設定が空のメンバーに対してDELETE
if ($is_delete) {
	$c_member_list = db_c_member_list4no_exists_rssAc_member_id($start_id, $end_id);
	db_delete_rss_cache4c_member_list($c_member_list);
}

//-------------------------------以下関数定義---------------------------//
/*
 * 一回のSQLでメンバー一人分のRSSキャッシュをINSERT
 */
function db_insert_c_rss_cache_list($c_member_id, $insert_rss_list)
{
	if (!$insert_rss_list) return false;

	$values_list = "";
	foreach ($insert_rss_list as $item) {
		$params = array(
			"c_member_id" => $c_member_id,
			"subject"     => $item['subject'],
			"body"        => $item['body'],
			"r_datetime"  => $item['r_datetime'],
			"link"        => $item['link'],
			"cache_date"  => date("Y-m-d H:i:s"),
		);

		$values = array_map("quote4db", array_values($params));
		$values = implode(",", $values);

		if($values_list != "")$values_list .= ",";
		$values_list .= "($values)";
	}

	$sql = "INSERT INTO c_rss_cache" .
			"(c_member_id, subject, body, r_datetime, link, cache_date)" .
		" VALUES $values_list";
	return _insert4db($sql);
}

function db_c_member_list4exists_rssAc_member_id($c_member_id, $limit)
{
	$sql = "SELECT * FROM c_member" .
			" WHERE rss <> ''" .
			" AND c_member_id > " . intval($c_member_id) .
			" ORDER BY c_member_id".
			" LIMIT " . intval($limit);

	return get_array_list4db($sql);
}
function db_c_member_list4no_exists_rssAc_member_id($c_member_id_from, $c_member_id_to)
{
	$sql = "SELECT * FROM c_member WHERE rss = ''";
	if (intval($c_member_id_from) > 0)
		$sql .= " AND c_member_id > " . intval($c_member_id_from);
	if (intval($c_member_id_to) > 0)
		$sql .= " AND c_member_id < " . intval($c_member_id_to);
	$sql .= " ORDER BY c_member_id";

	return get_array_list4db($sql);
}

function db_delete_rss_cache4c_member_list($c_member_list)
{
	$sql = "DELETE FROM c_rss_cache WHERE c_member_id IN (0";
	foreach($c_member_list as $c_member){
		_log('delete', $c_member['c_member_id']);
		$sql .= "," . intval($c_member['c_member_id']);
	}
	$sql .= ")";
	_mysql_query4db($sql);
}

function _log($action, $message)
{
	if (RSS_CACHE_DISPLAY_LOG) {
		echo $action . ": " . $message . "<br>\n";
	}
}

