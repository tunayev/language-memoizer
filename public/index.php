<?php 
require_once('../app/bootstrap.php');

ORM::configure('mysql:host=localhost;dbname='.DB_NAME);
ORM::configure('username', DB_USER);
ORM::configure('password', DB_PASS);
ORM::configure('id_column_overrides', array(
    'progress' => 'word_id'
));
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
ORM::configure('return_result_sets', true);
// Init Core Library

 $init = new Core;

/*  ORM::configure([
    'connection_string' => 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS,
    'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'),
    'caching' => true,
    'caching_auto_clear' => true
]); */



?>