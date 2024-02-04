<?php declare (strict_types = 1);

define('HOST','localhost');
define('DB','workshop');
define('USR','workshop');
define('PWD','workshop');
define('DSN','mysql:host='.HOST.';dbname='.DB);
define('OPT', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);

