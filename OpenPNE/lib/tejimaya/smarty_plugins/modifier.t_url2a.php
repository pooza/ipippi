<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty modifier plugin
 * URLをリンクに変換
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @return string
 */
function smarty_modifier_t_url2a($string)
{
	// "(&quot;) と '(&#039;) を元に戻す
	$search = array('&quot;', '&#039;');
	$replace = array('"', "'");
	$string = str_replace($search, $replace, $string);

	$url_pattern = "/https?:\/\/[\w\-.,:;\~\^\/?\@&=+\$%#!]+/";
	$string = preg_replace_callback($url_pattern, "__t_url_link", $string);

	return $string;
}

function __t_url_link($matches) {
	$url = $matches[0];

	$url_pattern = "/https?:\/\/[\w\-.,:;\~\^\/?\@&=+\$%#!]+/";
	$replacement = "<a href=\"\${0}\" target=\"_blank\">\${0}</a>";

	$url = preg_replace($url_pattern, $replacement, $url);

	return $url;
}

/* vim: set expandtab: */

