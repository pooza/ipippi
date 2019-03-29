<?php

ini_set('display_errors', false);

require_once './config.inc.php';

$dir = DOCUMENT_ROOT . "/var/file/" . sprintf('%010d', (int)$_GET['comment']);
if (!is_dir($dir)) {
	header("Location: page.php?p=h_err_c_file");
	exit;
}

$file = $_GET['filename'];
$file = str_replace('/', 'SLASH', $file); //念の為スラッシュだけはエスケープしておく
$file = $dir . '/' . md5($file);
if (!is_readable($file)) {
	header("Location: page.php?p=h_err_c_file");
	exit;
}

if (mb_detect_encoding($_GET['filename']) == 'ASCII') {
	$name = $_GET['filename'];
} else if (preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT'])) {
	$name = mb_convert_encoding($_GET['filename'], 'sjis');
} else if (preg_match('/Opera/', $_SERVER['HTTP_USER_AGENT'])) {
	$name = mb_convert_encoding($_GET['filename'], 'utf-8');
} else if (preg_match('/WebKit/', $_SERVER['HTTP_USER_AGENT'])) {
	$name = mb_ereg_replace('[^[:alnum:]_.]', '_', $_GET['filename']);
} else {
	$name = mb_convert_encoding($_GET['filename'], 'JIS');
	$name = base64_encode($name);
	$name = '=?iso-2022-jp?B?' . $name . '?=';
}
header('Content-Disposition: ' . sprintf('attachment; filename="%s"', $name));

$contents = file_get_contents($file);
header('Content-Length: ' . strlen($contents));
header('Content-Type: application/octet-stream');

mb_http_output('pass');
print $contents;

