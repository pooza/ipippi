<?php
require_once './config.inc.php';
require_once DOCUMENT_ROOT . '/lib/init.inc';
require_once DOCUMENT_ROOT . '/lib/tejimaya/TejimayaAuth.php';
require_once DOCUMENT_ROOT . '/lib/feedcreator/feedcreator.class.php';

// 認証
define('AUTH_TABLE',"c_member_secure");
define('AUTH_USERNAMECOL',"pc_address");
define('AUTH_PASSWORDCOL',"hashed_password");
$user = new TejimayaAuth(true);
$user->username = t_encrypt($_SERVER["PHP_AUTH_USER"]);
$user->password = $_SERVER["PHP_AUTH_PW"];
$user->start();
if(!$user->getAuth()){
	header("WWW-Authenticate: Basic realm=\"ipippi feed\"");
	header("HTTP/1.0 401 Unauthorized");
	exit;
} else if (!$id = _db_c_member_id4pc_address_encrypted($user->getUsername())) {
	header("WWW-Authenticate: Basic realm=\"ipippi feed\"");
	header("HTTP/1.0 401 Unauthorized");
	exit;
}
$user->uid($id);

// エントリー配列
$entries = array();

// 知り合いの日記
foreach (p_h_home_c_diary_friend_list4c_member_id($user->uid(), 10) as $row) {
	$entries[$row["r_datetime"]] = array(
		"title" => sprintf("[日記]%s '%s'", $row["nickname"], $row["subject"]),
		"date" => date("r", strtotime($row["r_datetime"])),
		"link" => ABSOLUTE_PATH
			. "page.php?p=fh_diary&target_c_diary_id="
			. $row["c_diary_id"],
	);
}

// トピック
foreach (p_h_home_c_commu_topic_comment_list4c_member_id($user->uid(), 10) as $row) {
	$entries[$row["r_datetime"]] = array(
		"title" => sprintf("[トピック]%s '%s'",
			$row["c_commu_name"],
			$row["c_commu_topic_name"]
		),
		"date" => date("r", strtotime($row["r_datetime"])),
		"link" => ABSOLUTE_PATH
			. "page.php?p=c_topic_detail&target_c_commu_topic_id="
			. $row["c_commu_topic_id"],
	);
}

// BLOG
foreach (p_h_diary_list_friend_c_rss_cache_list($user->uid(), 10) as $row) {
	$entries[$row["r_datetime"]] = array(
		"title" => sprintf("[BLOG]%s '%s'", $row["c_member"]["nickname"], $row["subject"]),
		"date" => date("r", strtotime($row["r_datetime"])),
		"link" => $row["link"],
	);
}

// レビュー
foreach (p_h_home_c_friend_review_list4c_member_id($user->uid(), 10) as $row) {
	$entries[$row["r_datetime"]] = array(
		"title" => sprintf("[レビュー]%s '%s'", $row["nickname"], $row["title"]),
		"date" => date("r", strtotime($row["r_datetime"])),
		"link" => ABSOLUTE_PATH
			. "page.php?p=h_review_list_product&c_review_id="
			. $row["c_review_id"],
	);
}

// メッセージ
$msg = p_h_message_box_c_message_received_user_list4c_member_id4range($user->uid(), 1, 20);
foreach ($msg[0] as $row) {
	$entries[$row["r_datetime"]] = array(
		"title" => sprintf("[メッセージ]%s '%s'", $row["nickname"], $row["subject"]),
		"date" => date("r", strtotime($row["r_datetime"])),
		"link" => ABSOLUTE_PATH . "page.php"
			. "?p=h_message"
			. "&target_c_message_id=" . $row["c_message_id"]
			. "&jyusin_c_message_id=" . $row["c_message_id"],
	);
}

// エントリー配列ソート
ksort($entries);

// フィード生成
define("TIME_ZONE", "+09:00");
$rss = new RSSCreator10();
$rss->title = mb_convert_encoding("ipippi", "utf-8", "euc-jp");
$rss->description = mb_convert_encoding("知財系SNS ipippi 最近の更新", "utf-8", "euc-jp");
$rss->link = ABSOLUTE_PATH;
$rss->encoding = "UTF-8";
foreach ($entries as $entry) {
	$item = new FeedItem();
	$item->title = mb_convert_encoding($entry["title"], "utf-8", "euc-jp");
	$item->date = $entry["date"];
	$item->link = $entry["link"];
	$item->description = "";
	$rss->addItem($item);
}

// 表示
header("Content-Type: " . $rss->contentType . "; charset=" . $rss->encoding);
print $rss->createFeed();
//$user->logout();
?>
