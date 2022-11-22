<?php

function getAllUser($conn){

    $stmt = $conn->query("SELECT * FROM users");
    $users= [];
    while ($row = $stmt->fetch()) {
        array_push($users, $row);
    }
    return $users;
}

function getUserByUserName($conn,$username){

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    $dataUser = array(
        'username' => $user['username'],
        'email' => $user['email'],
        'password' => $user['password'],
        'birthday' => $user['birthday'],
        'url' => $user['url'],
        'phone-number' => $user['phone_number']
    );

    return $dataUser;
}

function isUserExist($conn,$username)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    return $user;
}


function isDateValid($date)
{
    $dateArray = explode("/", $date);
    if (count($dateArray) < 3) {
        return false;
    }
    $month =  explode("/", $date)[0];
    $day =  explode("/", $date)[1];
    $year =  explode("/", $date)[2];
    return checkdate($month, $day, $year);
}

function deleteUserByUserName($conn,$username){
    $sql = "DELETE FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
}

function saveUser($conn, $user){
    $sql = 'INSERT INTO users (username, email, password, birthday, url, phone_number) values (?, ?, ?,?, ?, ?)';
    $statement = $conn->prepare($sql);

    
    $username =  $user["username"];
    $email =  $user["email"];
    $password =  $user["password"];
    $birthday =  $user["birthday"];
    $url = $user["url"];
    $phoneNumber =  $user["phone-number"];
    
    $statement->bindParam(1, $username);
    $statement->bindParam(2, $email);
    $statement->bindParam(3, $password);
    $statement->bindParam(4, $birthday);
    $statement->bindParam(5, $url);
    $statement->bindParam(6, $phoneNumber);


    $statement->execute();
}


