<?php
// admin モジュール initialize 処理

//ライブラリ読み込み
$module_lib_dir = dirname(__FILE__) . "/lib";
require_once($module_lib_dir . "/db_admin.php");
require_once($module_lib_dir . "/etc_admin.php");
require_once($module_lib_dir . "/hash_admin.php");

//デフォルトページ
$GLOBALS['__Framework']['default_page'] = 'top';

// ハッシュから action名を取得
$hash_tbl = AdminHashTable::singleton();
$action = $hash_tbl->action($action, $type);

function man_init_admin_page(&$smarty)
{
	// はまちちゃん対策用
	@session_start();
	$v['PHPSESSID'] = md5(session_id());

	$v['inc_header'] = admin_fetch_inc_header();
	$v['inc_footer'] = admin_fetch_inc_footer();
	$v['module_name'] = $GLOBALS['__Framework']['current_module'];
	$smarty->assign($v);

	$smarty->assign_by_ref('hash_tbl', AdminHashTable::singleton());
}

function man_init_admin_do()
{
	//はまちちゃん対策
	@session_start();
	if ($_REQUEST['sessid'] !== md5(session_id())) {
		die('前の画面を再読み込みして、操作をやり直してください');
	}
}


