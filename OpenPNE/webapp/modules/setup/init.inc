<?php
// setup モジュール initialize 処理

//ライブラリ読み込み
$module_lib_dir = dirname(__FILE__) . "/lib";

//デフォルトページ
$GLOBALS['__Framework']['default_page'] = 'dummy';
$GLOBALS['__Framework']['default_normal'] = 'setup';

function init_setup_page()
{
	module_execute('setup', 'normal');
	exit;
}

?>