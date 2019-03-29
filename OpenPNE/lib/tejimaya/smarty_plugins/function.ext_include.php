<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * 組み込み関数 include のextディレクトリ対応版
 *
 * 注意！ TejimayaSmartyクラスで使用しない限り動きません。
 *
 *   {include file="**"}
 *  なる部分を
 *   {ext_include file="**"}
 *  とすればOK
 *
 * @param string $smarty_file
 * @param string $smarty_assign variable to assign the included template's
 *               output into
 * @param boolean $smarty_once uses include_once if this is true
 * @param array $smarty_include_vars associative array of vars from
 *              {include file="blah" var=$var}
 */

//  $file, $assign, $once, $_smarty_include_vars
function smarty_function_ext_include($params, &$smarty)
{
	$tpl = $params['file'];
	if (!is_string($tpl)) {
		$smarty->trigger_error("param:'file' is not string");
		return;
	}
	if ($smarty->t_framework && $smarty->t_framework['call_type']) {
		$type = $smarty->t_framework['call_type'];

		// 拡張ファイルチェック
		$tpl = 'file:' . $smarty->t_framework['modules_dir'] . "/{$type}/ext/templates/" . $params['file'];
		if (!$smarty->template_exists($tpl)) { // extディレクトリにテンプレートがあるか
			$tpl = 'file:' . $smarty->t_framework['modules_dir'] . "/{$type}/templates/" . $params['file'];
			if (!$smarty->template_exists($tpl)) { // 標準ディレクトリにテンプレートがあるか
				$smarty->trigger_error('tpl file not found. '.$tpl);
			}
		}
	}
	$params['smarty_include_tpl_file'] = $tpl;
	$params['smarty_include_vars'] = array();
	$smarty->_smarty_include($params);
	return;
}

