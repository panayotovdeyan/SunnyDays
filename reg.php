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
    // check if data already exists
    require_once 'includes/db_SunnyDays.php';

    // Вземи email от POST или GET заявката
    $email = isset($_REQUEST['regEmail']) ? $_REQUEST['regEmail'] : '';
    
    // Почисти email-а за сигурност
    $email = mysqli_real_escape_string($conn, trim($email));
    
    $sqlCheckEmail = "SELECT * FROM `users` WHERE `email` = '$email'";
    $resultCheckEmail = mysqli_query($conn, $sqlCheckEmail);
    
    header('Content-Type: application/json'); // Указва, че връщаме JSON
    $response = ["success" => false, "message" => "Нещо се обърка."];
    
    if ($resultCheckEmail) {
        if (mysqli_num_rows($resultCheckEmail) > 0) {
            $response = ["success" => true, "registered" => true, "message" => "Имейлът вече е регистриран."];
        } else {
            $response = ["success" => true, "registered" => false, "message" => "Имейлът не е регистриран."];
        }
    } else {
        $response["message"] = "SQL грешка: " . mysqli_error($conn);
    }
    
    
    echo json_encode($response);
    exit; // Спира изпълнението, за да не се зарежда HTML
       
}


if( isset($_REQUEST['register']) && $_REQUEST['register'] == 2 && !$loged ){
    //register new user
    require_once 'includes/db_SunnyDays.php';
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if( $_SESSION['csrf_token'] != $csrf ){
        incrementWrongLogins();
        die("Not found!");
    }

    $email = cleanInput($_REQUEST['regEmail']);
    $email = mysqli_real_escape_string($conn, $email);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $name = cleanInput($_REQUEST['firstName']);
    $name = mysqli_real_escape_string($conn, $name);

    $family = cleanInput($_REQUEST['lastName']);
    $family = mysqli_real_escape_string($conn, $family);

    $city = cleanInput($_REQUEST['regCity']);
    $city = mysqli_real_escape_string($conn, $city);

    $pass = cleanInput($_REQUEST['regPassword']);
    $pass = mysqli_real_escape_string($conn, $pass);

    $pass2 = cleanInput($_REQUEST['confirmPassword']);
    $pass2 = mysqli_real_escape_string($conn, $pass2);

    $passHashed = password_hash($pass, PASSWORD_DEFAULT);

    if( !empty($email)  //not empty email
    
            && !empty($pass) 
            && !empty($pass2) 
            && !empty($name) 
            && !empty($family) 
            && $pass == $pass2 
            ){

        // check if data already exists
        $sqlCheckEmail = "SELECT * FROM `users` WHERE `email` = '$email'";
        $resultCheckEmail = mysqli_query($conn, $sqlCheckEmail);
        if(mysqli_num_rows($resultCheckEmail) > 0) {
            // data already exists
            echo "<script> 
                        alert ('$email притежава регистрация')
                        document.location.href = '/login.php'
                        </script>";
                        ?>
                        <a href="/login.php" class="btn btn-primary active"><h4>Вход/Влез</h4></a>
                        <?php
        } else {
                $querySQL = "INSERT INTO `users`(`name`, `family`, `email`, `password`, `city`) 
                                    VALUES ('$name','$family','$email','$passHashed', '$city')";
                $result = mysqli_query($conn, $querySQL);
                echo    "<script> 
                        alert ('Потребител $name $family е регистриран успешно!')
                        document.location.href = '/login.php'
                        </script>";

                if( empty($result) ){
                    $rformerror = true;
                }
            }
    }else{
        die('Има празно поле, Моля прегледайте всички полета');
    }
}
require_once 'views/register-html.php';

?>