<?php
function smarty_modifier_bs_date_format ($value, $format = 'Y/m/d H:i:s') {
	if (is_array($value)) {
		return $value;
	} else if ($value) {
		$timestamp = strtotime($value);
		if (preg_match('/ww/', $format)) {
			$weekdays = array('日', '月', '火', '水', '木', '金', '土');
			$format = str_replace('ww', $weekdays[date('w', $timestamp)], $format);
		}
		return date($format, $timestamp);
	}
}

/* vim:set tabstop=4 ai: */
