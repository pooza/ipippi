<?php

require_once './config.inc.php';
require_once DOCUMENT_ROOT . '/lib/init.inc';

module_execute('pc', 'normal', $_REQUEST['p']);
?>
