<?php


//デバッグ関連
$IMG_CONFIG['config_is_debug'] = false;   //デバッグモード（未実装）

//キャッシュ関連
$IMG_CONFIG['config_cache_source_enabled'] = false;  //キャッシュ使うかどうか

$IMG_CONFIG['config_cache_source_directory'] = DOCUMENT_ROOT . '/var/img_cache/';  //キャッシュディレクトリ

//フォーマット関連
/**
 * フォーマット指定の優先順位
 * １：GETで渡されるパラメータf
 * ２：fがなければ、全部'config_thumbnail_format'に従う
 * ３：'config_thumbnail_format'がなければ、そのまま出力
 * 
 */
$IMG_CONFIG['config_thumbnail_format'] = null;

?>
