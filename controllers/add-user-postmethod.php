<?php
require_once("database/mysql.php");
require_once("models/users.php");

function ValidateFormData()
{

    $isUsernameValid = (bool)preg_match('/^\pL+$/u', $_POST["username"]);
    $isEmailValid = !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ? false : true;
    $isPasswordValid  =  (bool)preg_match('/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^!&*+=]).*$/m', $_POST["password"]);
    $isBirthdayValid = isDateValid($_POST["birthday"]);
    $isUrlValid = (bool)preg_match('/^(?!(www|http|https)\.)\w+(\.\w+)+$/', $_POST["url"]);
    $isPhoneNumberValid = (bool)preg_match('/^[0-9]{10}+$/', $_POST["phone-number"]);

    $validateArray = [
        'isUsernameValid' => $isUsernameValid,
        'isEmailValid' => $isEmailValid,
        'isPasswordValid' => $isPasswordValid,
        'isBirthdayValid' => $isBirthdayValid,
        'isUrlValid' => $isUrlValid,
        'isPhoneNumberValid' => $isPhoneNumberValid,
    ];
    $isFormValid = true;
    foreach ($validateArray as $validateItem) {
        $isFormValid = $isFormValid && $validateItem;
    }
    $validateArray['isFormValid'] = $isFormValid;
    $validateArray['isUserExist'] = false;

    return $validateArray;
}


$errorList = [
    'isUserExist' => null,
    'isUsernameValid' => null,
    'isEmailValid' => null,
    'isPasswordValid' => null,
    'isBirthdayValid' => null,
    'isUrlValid' => null,
    'isPhoneNumberValid' => null,
    'isFormValid' => null,
];

$isUserExist = isUserExist($connection, $_POST["username"]);
if ($isUserExist) {
    $errorList['isUserExist'] = true;
    showView("add-user", $errorList);
    die();
}else{
    
    $validateArray = ValidateFormData();
    $isFormValid = $validateArray['isFormValid'];
    if ($isFormValid ) {
    
        $formData = [
            'username' =>  $_POST["username"],
            'email' =>  $_POST["email"],
            'password' =>  $_POST["password"],
            'birthday' =>  date('Y-m-d', strtotime($_POST["birthday"])),
            'url' => $_POST["url"],
            'phoneNumber' =>  $_POST["phone-number"],
        ];
    
        saveUser($connection, $formData);
    
        header("Location: /list");
    } else {
        showView("add-user", $validateArray);
        die();
    }

}
