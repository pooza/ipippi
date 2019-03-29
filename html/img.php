<?php

ini_set('display_errors', false);
@ob_start();

require_once './config.inc.php';
require_once DOCUMENT_ROOT . '/config/' . $_SERVER["SERVER_NAME"] . '.inc';

$img_dir = DOCUMENT_ROOT . "/webapp/lib/img/";
require_once $img_dir . 'img.config.php';
require_once $img_dir . 'img.class.php';

if (defined('USE_IMAGEMAGICK') && USE_IMAGEMAGICK) {
	require_once $img_dir . 'img_imgmagick.class.php';
	$img =& new Img_ImgMagick();
} else {
	$img =& new Img();
}

$img->set_safe_vars($_GET);
$img->set_vars($IMG_CONFIG);

if(!$img->generate_img()) {exit(1);}
@ob_end_clean();

if(!$img->output_img()) {exit(1);}

