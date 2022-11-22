<?php
  require_once("database/mysql.php");
  require_once("models/users.php"); 

$dataUser = [];

if (isset($_GET["user"])) {
    $username = $_GET["user"];
    $dataUser = getUserByUserName($connection, $username );    
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($dataUser);
