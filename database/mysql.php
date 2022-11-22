<?php
if(!defined('APP_ROOT')) {echo "access not allowed";  exit; }


$databaseConfig = [
    'dsn' => $_ENV['DB_DSN'] ?? "mysql:host=localhost;dbname=interview",
    'user' => $_ENV['DB_USER'] ?? "root",
    'password' => $_ENV['DB_PASSWORD'] ?? "1702199711111996",
];


$dbDsn = $databaseConfig['dsn'];
$username = $databaseConfig['user'];
$password = $databaseConfig['password'];

$connection = new \PDO($dbDsn, $username, $password);
$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

