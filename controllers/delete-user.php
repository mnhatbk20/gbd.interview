<?php
require_once("database/mysql.php");
require_once("models/users.php");

if (isset($_GET["user"])) {

    header('Content-Type: application/json; charset=utf-8');

    $username = $_GET["user"];
    $isUserExist = isUserExist($connection, $username);
    if (!$isUserExist) {
        $response = ['message' => "User is not exist"];
        echo json_encode($response);
        die();
    }
    
    deleteUserByUserName($connection,$username);
    $response = ['message' => "Delete Success"];    
    echo json_encode($response);

} else {

    $response = ['message' => "Request is not valid"];
    echo json_encode($response);
}

