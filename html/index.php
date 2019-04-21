<?php

require_once './config.inc.php';
require_once DOCUMENT_ROOT . '/lib/init.inc';

$m = '';
if (empty($_REQUEST['m'])) {
	$ktai_uas = array(
		'DoCoMo',
		'UP.Browser',
		'KDDI',
		'J-PHONE',
		'Vodafone',
		'SoftBank',
		'MOT',
		'DDIPOCKET',
	);

	foreach ($ktai_uas as $item) {
		if (strpos($_SERVER['HTTP_USER_AGENT'], $item) !== false) {
			header('Location: ktai.php');
			exit;
		}
	}
	if (!$m)
		$m = 'pc';

} else {
	$m = $_REQUEST['m'];
}

module_execute($m, 'page');

