<?php declare(strict_types = 1);

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

$pdo = new \PDO(DSN,USR,PWD,OPT);
$req = $pdo->prepare("INSERT INTO roles(ro_name) VALUES (:ro_name)");
$req->bindValue(':ro_name', 'administrators');
$req->execute();

$req = $pdo->prepare("INSERT INTO employees(em_firstname,em_lastname,em_email,em_password,ro_id) VALUES (:em_firstname, :em_lastname, :em_email, :em_password,:ro_id)");
$req->bindValue(':em_firstname', 'admin');
$req->bindValue(':em_lastname', 'admin');
$req->bindValue(':em_email', 'admin@localhost');
$req->bindValue(':ro_id', 1);
$req->bindValue(':em_password', \password_hash('workshop', PASSWORD_BCRYPT));
$req->execute();
$req->closeCursor();