<?php
    // echo phpversion();
    session_start();
    /* Valid PHP Version  */
    $minPHPVersion = '8.0';
    if (phpversion() < $minPHPVersion)
    {
        die("Your PHP Version must be {$minPHPVersion} or higher to run this App. Your current version is " . phpversion());
    }

    /** Path To This File **/
    define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
    

    require "../app/core/init.php";

    DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

    
    $app = new App;
    $app->loadController();
    


    

    
   

