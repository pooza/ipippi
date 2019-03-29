<?php

function admin_fetch_inc_header($title = '', $display_navi = true)
{
	if (!$title) {
		$title = SNS_NAME . "管理ページ";
	}
	$v['title'] = $title;
	$v['display_navi'] = $display_navi;
	$v['SNS_NAME'] = SNS_NAME;
	$v['PHPSESSID'] = md5(session_id());
	$v['module_name'] = $GLOBALS['__Framework']['current_module'];
	
	if (defined('ADMIN_INIT_CONFIG')) {
		$v['ADMIN_INIT_CONFIG'] = ADMIN_INIT_CONFIG;
	} else {
		$v['ADMIN_INIT_CONFIG'] = false;
	}
	
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->ext_set_call_type($GLOBALS['__Framework']['current_module']);
	$inc_smarty->assign($v);
	
	$inc_smarty->assign_by_ref('hash_tbl', AdminHashTable::singleton());	
	
	return $inc_smarty->ext_fetch('inc_header.tpl');
}

function admin_fetch_inc_footer()
{
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->ext_set_call_type($GLOBALS['__Framework']['current_module']);
	return $inc_smarty->ext_fetch('inc_footer.tpl');
}

function admin_make_pager($page, $page_size, $total_num)
{
	$pager = array(
		'page' => $page,
		'page_size' => $page_size,
		'total_num' => $total_num,
		'start_num' => ($page - 1) * $page_size + 1,
		'end_num' => $page * $page_size,
		'total_page' => ceil($total_num / $page_size),
		'prev_page' => 0,
		'next_page' => 0,
	);

	// 表示している最後の番号	
	if ($pager['end_num'] > $pager['total_num'])
		$pager['end_num'] = $pager['total_num'];

	// 前ページ
	if ($pager['page'] > 1)
		$pager['prev_page'] = $page - 1;
	
	// 次ページ
	if ($pager['end_num'] < $pager['total_num'])
		$pager['next_page'] = $page + 1;

	$disp_first = max(($page - 10), 1);
	$disp_last = min(($page + 9), $pager['total_page']);
	for (; $disp_first <= $disp_last; $disp_first++) {
		$pager['disp_pages'][] = $disp_first;
	}
	
	return $pager;
}

function admin_insert_c_image($upfile_obj, $filename)
{
	if ($upfile_obj &&
		is_uploaded_file($upfile_obj['tmp_name']) &&
		_do_insert_c_image($filename, $upfile_obj['tmp_name']) > 0)
	{
		return $filename;
	}
	
	return false;
}

function admin_client_redirect($p, $msg = '', $tail = '')
{
	$hash_tbl =& AdminHashTable::singleton();
	
	$m = $GLOBALS['__Framework']['current_module'];
	$p = $hash_tbl->hash($p);
	
	$url = "module_page.php?m=$m&p=$p&$tail";
	if ($msg) $url .= "&msg=" . urlencode($msg);
	
	client_redirect($url);
}

