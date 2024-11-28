<?php
session_start();
define("SunnyDays", true);
if (isset($_SESSION['loged']) && $_SESSION['loged']) {
    $loged = true;
    require_once 'profile.php';
} else {
    $loged = false;
}
require_once 'includes/functions.php';

if (isset($_REQUEST['register']) && $_REQUEST['register'] == 1 && !$loged) {
    // Register new user
    require_once 'includes/db_SunnyDays.php';
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);

    if ($_SESSION['csrf_token'] != $csrf) {
        incrementWrongLogins();
        die("Not found!");
    }

    // Sanitize and validate input
    $email = cleanInput($_REQUEST['register_email']);
    $email = mysqli_real_escape_string($conn, $email);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $pass = cleanInput($_REQUEST['register_password']);
    $pass = mysqli_real_escape_string($conn, $pass);

    $pass2 = cleanInput($_REQUEST['register_password2']);
    $pass2 = mysqli_real_escape_string($conn, $pass2);

    $name = cleanInput($_REQUEST['register_name']);
    $name = mysqli_real_escape_string($conn, $name);

    $family = cleanInput($_REQUEST['register_family']);
    $family = mysqli_real_escape_string($conn, $family);

    // Validation
    // $errors = [];

    // if (!$email) {
    //     $errors[] = "Невалиден имейл.";
    // }
    // if (strlen($pass) < 8) {
    //     $errors[] = "Паролата трябва да съдържа поне 8 символа.";
    // }
    // if (!preg_match("/[A-Z]/", $pass) || !preg_match("/[a-z]/", $pass) || !preg_match("/[0-9]/", $pass)) {
    //     $errors[] = "Паролата трябва да съдържа поне една главна буква, една малка буква и едно число.";
    // }
    // if ($pass !== $pass2) {
    //     $errors[] = "Паролите не съвпадат.";
    // }
    // if (strlen($name) < 2 || strlen($name) > 50) {
    //     $errors[] = "Името трябва да е между 2 и 50 символа.";
    // }
    // if (strlen($family) < 2 || strlen($family) > 50) {
    //     $errors[] = "Фамилията трябва да е между 2 и 50 символа.";
    // }

    if (empty($errors)) {
        $pass3 = password_hash($pass, PASSWORD_DEFAULT);

        // Check if data already exists
        $sqlCheckEmail = "SELECT * FROM `users` WHERE `email` = '$email'";
        $resultCheckEmail = mysqli_query($conn, $sqlCheckEmail);

        if (mysqli_num_rows($resultCheckEmail) > 0) {
            echo "Потребител с имейл - $email, вече има регистрация в сайта";
            ?>
            <a href="/login.php" class="btn btn-primary active"><h4>Вход/Влез</h4></a>
            <?php
        } else {
            $querySQL = "INSERT INTO `users`(`name`, `family`, `email`, `password`) 
                         VALUES ('$name', '$family', '$email', '$pass3')";
            $result = mysqli_query($conn, $querySQL);
            echo "Потребител $name $family е регистриран успешно!";
            ?>
            <a href="/login.php" class="btn btn-primary active"><h4>Вход/Влез</h4></a>
            <?php
            if (empty($result)) {
                $rformerror = true;
            }
        }
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
require_once 'views/register-html.php';
?>
