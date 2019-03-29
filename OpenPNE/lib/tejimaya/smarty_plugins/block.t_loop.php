<?php
/**
 * Smarty plugin
 */

/**
 * Smarty {t_loop}{/t_loop} block plugin
 *
 * Type:     block function<br>
 * Name:     t_loop<br>
 * Purpose:  foreachの代替品<br>
 * @param array
 * <pre>
 * Params:   from: array
 *           start: integer (6)
 *           max: integer (3)
 *           item: text (item)
 * </pre>
 * @param string contents of the block
 * @param Smarty clever simulation of a method
 * @param bool repeat
 * @return string string $content re-formatted
 * 
 */
function smarty_block_t_loop($params, $content, &$smarty, &$repeat) {
	static $i;

	// start
	if (intval($params['start']) > 0) {
		$start = intval($params['start']);
	} else {
		$start = 0;
	}
	
	// item
	if (empty($params['item'])) {
		$item = "item";
	} else {
		$item = $params['item'];
	}	

	// main
	if (is_null($content)) { // 初期化
		$i = $start;
		
		if (!isset($params['from'][$i])) { // 要素が1個もない
			$repeat = false;
		} else {
			$smarty->assign($item, $params['from'][$i++]);
		}
	} else {
		$max = $start + $params['num'];

		if ($i >= $max) {
			$repeat = false;
			if ($i > $max) $content = "";
			unset($i);
		} else {
			$repeat = true;
			$smarty->assign($item, $params['from'][$i++]);
		}
		return $content;
	}
}

/* vim: set expandtab: */

