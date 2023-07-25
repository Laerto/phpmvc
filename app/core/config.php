<?php
 defined('ROOTPATH') OR exit('Access Denied!');


if($_SERVER['SERVER_NAME'] == 'localhost')
{

    /** Database Config */
    define('DBNAME', 'test');
    define('DBHOST', 'localhost');
    define('DBUSER', 'test');
    define('DBPASS', '@test');
    define('DBDRIVER', 'mysql');

    define('ROOT', 'http://localhost/');
}else {

    /** Database Config */
    define('DBNAME', 'test');
    define('DBHOST', 'localhost');
    define('DBUSER', 'test');
    define('DBPASS', '@test');
    define('DBDRIVER', 'mysql');

    define('ROOT', 'https://www.example.com');
}

define('APP_NAME', 'PHP_MVC_Core');
define('APP_DESC', 'This is a PHP MVC Framework');

define('DEBUG', true);