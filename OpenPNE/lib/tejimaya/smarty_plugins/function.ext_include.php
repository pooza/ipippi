<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * �Ȥ߹��ߴؿ� include ��ext�ǥ��쥯�ȥ��б���
 *
 * ��ա� TejimayaSmarty���饹�ǻ��Ѥ��ʤ��¤�ư���ޤ���
 *
 *   {include file="**"}
 *  �ʤ���ʬ��
 *   {ext_include file="**"}
 *  �Ȥ����OK
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

		// ��ĥ�ե���������å�
		$tpl = 'file:' . $smarty->t_framework['modules_dir'] . "/{$type}/ext/templates/" . $params['file'];
		if (!$smarty->template_exists($tpl)) { // ext�ǥ��쥯�ȥ�˥ƥ�ץ졼�Ȥ����뤫
			$tpl = 'file:' . $smarty->t_framework['modules_dir'] . "/{$type}/templates/" . $params['file'];
			if (!$smarty->template_exists($tpl)) { // ɸ��ǥ��쥯�ȥ�˥ƥ�ץ졼�Ȥ����뤫
				$smarty->trigger_error('tpl file not found. '.$tpl);
			}
		}
	}
	$params['smarty_include_tpl_file'] = $tpl;
	$params['smarty_include_vars'] = array();
	$smarty->_smarty_include($params);
	return;
}
?>
