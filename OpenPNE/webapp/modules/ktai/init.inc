<?php
function init_ktai_page(&$smarty)
{
	$smarty->load_filter('output', 'mobile');
	header('Content-Type: text/html; charset=Shift_JIS');
}

function init_ktai_normal (&$smarty)
{
	$smarty->load_filter('output', 'mobile');
	header('Content-Type: text/html; charset=Shift_JIS');
}
