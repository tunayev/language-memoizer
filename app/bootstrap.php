<?php
//Load config
require_once 'config/config.php';

//Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/functions.php';
require_once 'libraries/ORM.php';
spl_autoload_register(function($className) {
    require_once 'libraries/'.$className.'.php';
});