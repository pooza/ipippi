<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
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
// マルチバイト文字列対応版
function smarty_modifier_t_truncate($string, $length = 80, $etc = '...',
                                  $break_words = true)
{	
    if ($length == 0)
        return '';

	// unescape
    $trans_table = get_html_translation_table(HTML_SPECIALCHARS, ENT_QUOTES);
	if ($trans_table["'"] != '&#039;') { // some versions of PHP match single quotes to &#39;
		$trans_table["'"] = '&#039;';
	}
    $string = strtr($string, array_flip($trans_table));

    if (strlen($string) > $length) {
        $length -= strlen($etc);
        if (!$break_words)
            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
      
        $string = mb_strimwidth($string, 0, $length) . $etc;
    }
    
    // escape
    $string = htmlspecialchars($string, ENT_QUOTES);
    
    return $string;
}

/* vim: set expandtab: */

?>
