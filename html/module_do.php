<?php

require_once './config.inc.php';
require_once DOCUMENT_ROOT . '/lib/init.inc';

module_execute($_REQUEST['m'], 'do', $_REQUEST['cmd']);

