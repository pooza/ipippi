<?php

//デフォルトページ
$GLOBALS['__Framework']['default_page'] = 'h_home';
$GLOBALS['__Framework']['default_normal'] = 'login';

//<PCKTAI
if (defined('OPENPNE_ENABLE_KTAI') && !OPENPNE_ENABLE_KTAI) {
	// disable ktai module
	exit;
}
//>

//半角カタカナを全角に変換
$_REQUEST = zen2han($_REQUEST);

function zen2han ($arg) {
	if (is_object($arg)) {
		return $arg;
	} else if (is_array($arg)) {
		foreach ($arg as $key => $value) {
			$arg[$key] = zen2han($value);
		}
		return $arg;
	} else {
		return mb_convert_kana($arg, 'KV');
	}
}

function init_ktai_page(&$smarty)
{
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_ktai_header', fetch_inc_ktai_header());
	$smarty->assign('inc_ktai_footer', fetch_inc_ktai_footer());

	// ケータイ用出力時フィルタ
	$smarty->load_filter('output', 'mobile');
	header('Content-Type: text/html; charset=Shift_JIS');
	
	//全ページ共通変数のアサイン
	$smarty->assign('u', $GLOBALS['KTAI_C_MEMBER_ID']);
	$smarty->assign('tail', $GLOBALS['KTAI_URL_TAIL']);
	$smarty->assign('msg', k_p_common_msg4msg_id($_REQUEST['msg']));
	
	@session_start();
	$smarty->assign('PHPSESSID', session_id());	
	
	//文言系
	$smarty->assign('WORD_FRIEND', WORD_FRIEND);
	$smarty->assign('WORD_MY_FRIEND', WORD_MY_FRIEND);
	$smarty->assign('WORD_FRIEND_HALF', WORD_FRIEND_HALF);
	$smarty->assign('WORD_MY_FRIEND_HALF', WORD_MY_FRIEND_HALF);
}

function init_ktai_normal(&$smarty)
{
	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_ktai_header', fetch_inc_ktai_header());
	$smarty->assign('inc_ktai_footer', fetch_inc_ktai_footer());
	
	$smarty->assign('msg', k_p_common_msg4msg_id($_REQUEST['msg']));	

	// ケータイ用出力時フィルタ
	$smarty->load_filter('output', 'mobile');
	header('Content-Type: text/html; charset=Shift_JIS');
}
	
?>
