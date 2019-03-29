<?php
function getConfigFileName () {
	if (!$server = $_SERVER["SERVER_NAME"]) {
		$server = $_SERVER["argv"][1];
	}

	if (!$server) {
		print "ホスト名が取得出来ません。";
		exit(1);
	}

	return DOCUMENT_ROOT . '/config/' . $server . '.inc';
}

function p ($value) {
	print('<div align="left"><pre>');
	if (extension_loaded('xdebug')) {
		var_dump($value);
	} else {
		print_r($value);
	}
	print('</pre></div>');
}
?>
