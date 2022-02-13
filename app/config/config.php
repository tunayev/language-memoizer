<?php
//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvcquiz');
//App Root
define('APPROOT', dirname(dirname(__FILE__)));
//URL Root
define('URLROOT', 'http://localhost:8080/mvcq');
//Sitename
define('SITENAME', 'MVC Quiz');
//App Version
define('APP_VERSION', '1.0.0');

// Configure Idiorm

/* ORM::configure([
    'connection_string' => 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS,
    'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'),
    'caching' => true,
    'caching_auto_clear' => true
]); */