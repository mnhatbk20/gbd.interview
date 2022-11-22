<?php
if(!defined('APP_ROOT')) {echo "access not allowed";  exit; }


$isUserExist = $data["isUserExist"];
$isUsernameValid = $data["isUsernameValid"];
$isEmailValid = $data['isEmailValid'];
$isPasswordValid  =  $data['isPasswordValid'];
$isBirthdayValid = $data['isBirthdayValid'];
$isUrlValid = $data['isUrlValid'];
$isPhoneNumberValid = $data['isPhoneNumberValid'];
$isFormValid = $data['isFormValid'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/public/css/form.css">
</head>



<body>
    <section>

    <h1 style="text-align:center">Add New User</h1>
        <form action="/add-user" method="POST">

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="">
                <?php if (isset($isUsernameValid)) echo (!$isUsernameValid ? '<div class="err-alert" style="color:red" id="username-valid">Invalid</div>' : "")           ?>
                <?php if (isset($isUserExist)) echo ($isUserExist ? '<div class="err-alert" style="color:red" id="username-valid">User Exist</div>' : "") ?>


            </div>
            <div class="input-group">

                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="">
                <?php if (isset($isEmailValid)) echo (!$isEmailValid ? '<div class="err-alert" style="color:red" id="email-valid">Invalid</div>' : "") ?>
            </div>
            <div class="input-group">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="">
                <?php if (isset($isPasswordValid)) echo (!$isPasswordValid ? '<div class="err-alert" style="color:red" id="password-valid">Invalid</div>' : "") ?>
            </div>

            <div class="input-group">

                <label for="birthday">Birthday</label>
                <input type="text" id="birthday" name="birthday" placeholder="mm/dd/yyyy">
                <?php if (isset($isBirthdayValid)) echo (!$isBirthdayValid ? '<div class="err-alert" style="color:red" id="birthday-valid">Invalid</div>' : "") ?>
            </div>

            <div class="input-group">

                <label for="phone-number">Phone Number</label>
                <input type="text" id="phone-number" name="phone-number" value="">
                <?php if (isset($isPhoneNumberValid)) echo (!$isPhoneNumberValid ? '<div class="err-alert" style="color:red" id="phone-number-valid">Invalid</div>' : "") ?>
            </div>

            <div class="input-group">
                <label for="url">URL</label>
                <input type="text" id="url" name="url" value="">
                <?php if (isset($isUrlValid)) echo (!$isUrlValid ? '<div class="err-alert" style="color:red" id="url-valid">Invalid</div>' : "") ?>
            </div>

            <br>
            <input type="submit" value="Submit">
        </form>

    </section>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>

<?php
