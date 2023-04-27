<?php

session_start();
define("cmsdp", true);
require_once 'includes/functions.php';
require_once 'includes/db_cmsdp.php';


if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    $loged = true;
    $formerror = false;
    echo "<h3>Вие вече сте регистриран и абониран за бюленина</h3>";
    require_once 'profile.php';

}elseif ($_REQUEST['email'] > 0)    {
        $email = $_REQUEST['email'];
        $email = mysqli_real_escape_string($conn, $email);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        // Проверка дали имейла го има вече в базата
        $sqlCheckEmail = "SELECT * FROM `newsletter` WHERE `email` = '$email'";
        $resultCheckEmail = mysqli_query($conn, $sqlCheckEmail);

        if(mysqli_num_rows($resultCheckEmail) > 0) {
            // data already exists
            echo "Потребител с имейл - $email, вече има регистрация за Бюлетина";
            ?>
            <a href="/" class="btn btn-primary active"><h4>Начало</h4></a>
            <?php
        }else{
            $querySQL = "INSERT INTO `newsletter`(`email`) VALUES ('$email')";
            $result = mysqli_query($conn, $querySQL);
            require_once 'views/subscribed-html.php';

            if( empty($result) ){
                $formerror = true;
            }
        }
    }else{
        header ('Location: index.php');

    }
?>