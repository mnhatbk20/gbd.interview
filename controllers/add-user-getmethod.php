<?php
require_once("database/mysql.php");
require_once("models/users.php");

showView("add-user",[
    'isUserExist' => null,
    'isUsernameValid' => null,
    'isEmailValid' => null,
    'isPasswordValid'  => null,
    'isBirthdayValid' => null,
    'isUrlValid' => null,
    'isPhoneNumberValid' => null,
    'isFormValid' => null
]);



