<?php
defined("DATA_PATH")
    or define("DATA_PATH", realpath(dirname(__FILE__) . '/data'));

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

defined("LESS_PATH")
    or define("LESS_PATH", realpath(dirname(__FILE__) . '/less'));

defined("ASSETS_PATH")
    or define("ASSETS_PATH", realpath(dirname(__FILE__) . '/../assets'));

require_once(DATA_PATH . '/pages.php');

// Google Analytics ID
$GAID = ''
?>
