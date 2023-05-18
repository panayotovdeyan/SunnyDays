<?php
session_start();
define("SunnyDays", true);
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    $loged = true;
    require_once 'profile.php';
    // header("Location: views/header-html.php");
}else{
    $loged = false;
}
require_once 'includes/functions.php';
if( isset($_REQUEST['register']) && $_REQUEST['register'] == 1 && !$loged ){
    //register new user
    require_once 'includes/db_SunnyDays.php';
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if( $_SESSION['csrf_token'] != $csrf ){
        incrementWrongLogins();
        die("Not found!");
    }

    $pass = cleanInput($_REQUEST['register_password']);
    $pass = mysqli_real_escape_string($conn, $pass);
    $pass2 = cleanInput($_REQUEST['register_password2']);
    $pass2 = mysqli_real_escape_string($conn, $pass2);
    $email = cleanInput($_REQUEST['register_email']);
    $email = mysqli_real_escape_string($conn, $email);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $name = cleanInput($_REQUEST['register_name']);
    $name = mysqli_real_escape_string($conn, $name);
    $family = cleanInput($_REQUEST['register_family']);
    $family = mysqli_real_escape_string($conn, $family);

    if( !empty($email)  //not empty email
            && !empty($pass) 
            && !empty($pass2) 
            && !empty($name) 
            && !empty($family) 
            && $pass == $pass2 ){

        $pass3 = password_hash($pass, PASSWORD_DEFAULT);

        // check if data already exists
        $sqlCheckEmail = "SELECT * FROM `users` WHERE `email` = '$email'";
        $resultCheckEmail = mysqli_query($conn, $sqlCheckEmail);

        if(mysqli_num_rows($resultCheckEmail) > 0) {
            // data already exists
            echo "Потребител с имейл - $email, вече има регистрация в сайта";
            ?>
            <a href="/login.php" class="btn btn-primary active"><h4>Вход/Влез</h4></a>
            <?php
        } else {
                $querySQL = "INSERT INTO `users`(`name`, `family`, `email`, `password`) 
                                    VALUES ('$name','$family','$email','$pass3')";
                $result = mysqli_query($conn, $querySQL);
                echo "Потребител $name $family е регистриран успешно!";
                ?>
                <a href="/login.php" class="btn btn-primary active"><h4>Вход/Влез</h4></a>
                <?php
                if( empty($result) ){
                    $rformerror = true;
                }
            }
    }
}

require_once 'views/register-html.php';

?>