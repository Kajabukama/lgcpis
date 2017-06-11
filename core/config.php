<?php
    // database constants

    defined("DB_SERVER") ? NULL : define("DB_SERVER","localhost");
    defined("DB_USER") ? NULL : define("DB_USER","root");
    defined("DB_PASS") ? NULL : define("DB_PASS","");
    defined("DB_NAME") ? NULL : define("DB_NAME","lgcpis_db");

    // directory separator
    defined("DS") ? NULL : define("DS",DIRECTORY_SEPARATOR);
    defined("SITE_ROOT") ? NULL : define("SITE_ROOT", "C:".DS."wamp".DS."www".DS."lgcpis");

    // time/date constants
    defined("DAYS") ? NULL : define("DAYS", 60*60*24);
    defined("HOURS") ? NULL : define("HOURS", 60*60);
    defined("MINUTES") ? NULL : define("MINUTES", 60);
    defined("SECONDS") ? NULL : define("SECONDS", 0);

    // autoloading all necessary class files 
    spl_autoload_register( function ($class){
        $file = 'classes/'.$class.'.php';
        if (file_exists($file)) {
            require_once 'classes/'.$class.'.php';
        }else{
            require_once '../classes/'.$class.'.php';
        }
    });

    // require all necessary utility functions
    require_once("functions.php");

    $database = new MySQLDatabase();
    $session = new Session();

    




