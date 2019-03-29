<?php

//デフォルトページ
$GLOBALS['__Framework']['default_page'] = 'h_home';
$GLOBALS['__Framework']['default_normal'] = 'login_do_login';

//<PCKTAI
if (defined('OPENPNE_ENABLE_PC') && !OPENPNE_ENABLE_PC) {
	// disable pc module
	exit;
}
//>

function init_pc_page(&$smarty)
{
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_html_header', fetch_inc_html_header());
	$smarty->assign('inc_page_header', fetch_inc_page_header());
	$smarty->assign('inc_page_footer', fetch_inc_page_footer(true));
	$smarty->assign('inc_extension_pagelayout_top', p_common_c_siteadmin4target_pagename('inc_page_top'));
	$smarty->assign('inc_extension_pagelayout_bottom', p_common_c_siteadmin4target_pagename('inc_page_bottom'));
    $smarty->assign('inc_side_banner', p_inc_c_banner_side4null());
    $smarty->assign('side_banner_html', p_common_c_siteadmin4target_pagename('side_banner_html'));
	
	// はまちちゃん対策用
	@session_start();
	$smarty->assign('PHPSESSID', md5(session_id()));
	
	//文言系
	$smarty->assign('WORD_FRIEND', WORD_FRIEND);
	$smarty->assign('WORD_MY_FRIEND', WORD_MY_FRIEND);
	$smarty->assign('WORD_FRIEND_HALF', WORD_FRIEND_HALF);
	$smarty->assign('WORD_MY_FRIEND_HALF', WORD_MY_FRIEND_HALF);

	// 最新日記
	$result = p_h_diary_list_all_search_c_diary4c_diary(null, 15, 1);
	$smarty->assign('diaries', $result[0]);
	$smarty->assign('blog_entries', p_h_diary_list_all_c_rss_cache_list(15));
	$smarty->assign('side_banner_html', true);

	// ニュース
	require_once DOCUMENT_ROOT . '/lib/magpierss/rss_fetch.inc';
	$entries = array();
	foreach ($GLOBALS['__OpenPNE']['news'] as $name => $url) {
		$rss = fetch_rss($url);
		foreach ($rss->items as $item) {
			$entries[] = array(
				"title" => mb_convert_encoding(
					sprintf("[%s] %s", $name, $item["title"]),
					"EUC-JP",
					MAGPIE_OUTPUT_ENCODING
				),
				"link" => $item["link"]
			);
		}
		unset($rss);
	}
	$smarty->assign('news', $entries);
	if ($_GET["rss"]) {
		$smarty->assign("rss", true);
	}
	unset($entries);
}

function init_pc_normal(&$smarty)
{
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_html_header', fetch_inc_html_header());
	$smarty->assign('inc_page_footer', fetch_inc_page_footer(false));
	$smarty->assign('inc_extension_pagelayout_top', p_common_c_siteadmin4target_pagename('inc_page_top'));
	$smarty->assign('inc_extension_pagelayout_bottom', p_common_c_siteadmin4target_pagename('inc_page_bottom'));
    $smarty->assign('inc_side_banner', p_inc_c_banner_side4null());
    $smarty->assign('side_banner_html', p_common_c_siteadmin4target_pagename('side_banner_html'));

	//文言系
	$smarty->assign('WORD_FRIEND', WORD_FRIEND);
	$smarty->assign('WORD_MY_FRIEND', WORD_MY_FRIEND);
	$smarty->assign('WORD_FRIEND_HALF', WORD_FRIEND_HALF);
	$smarty->assign('WORD_MY_FRIEND_HALF', WORD_MY_FRIEND_HALF);
}

function init_pc_do()
{
	// はまちちゃん対策
	if ($_REQUEST['sessid'] !== md5(session_id())) {
		if (defined('HAMACHI_EMAIL') && HAMACHI_EMAIL) {
			$subject = 'SNS Hamachi Checker ' . SNS_NAME;
			$body = 'c_member_id: ' . $GLOBALS['AUTH']->uid() . "\n" .
					ABSOLUTE_PATH . basename($_SERVER['REQUEST_URI']);
			t_send_email(HAMACHI_EMAIL, $subject, $body);
		}
		
		die('前の画面を再読み込みして、操作をやり直してください');
	}
}

?>
