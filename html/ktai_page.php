<?php

require_once './config.inc.php';
require_once DOCUMENT_ROOT . '/lib/init.inc';

module_execute('ktai', 'page', $_REQUEST['p']);
?>
