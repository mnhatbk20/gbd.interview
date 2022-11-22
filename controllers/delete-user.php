<?php
require_once("database/mysql.php");
require_once("models/users.php");

if (isset($_GET["user"])) {

    $username = $_GET["user"];
    $isUserExist = isUserExist($connection, $username);
    if (!$isUserExist) {
        $response = ['message' => "User is not exist"];
        responseJson($response);
    }
    
    deleteUserByUserName($connection,$username);
    $response = ['message' => "Delete Success"];  
    responseJson($response);

} else {

    $response = ['message' => "Request is not valid"];
    responseJson($response);
}

