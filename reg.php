<?php
session_start();
define("SunnyDays", true);

// Път към базата данни и конфигурацията
require_once 'includes/db_SunnyDays.php';
$config = require 'C:/xampp/config-sunnydays.php';

// Импорт на PHPMailer класовете
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/SMTP.php';

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
            $response = ["success" => true, "registered" => true, "message" => "Този имейл адрес вече е регистриран. Моля, влезте в профила си или използвайте 'Забравена парола', ако не я помните."];
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

    $config = require 'C:/xampp/config-sunnydays.php'; // Зареждаме Secret Key

    // --- НАЧАЛО RECAPTCHA ПРОВЕРКА ---
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = $config['recaptcha_secret_key'];
    $userIp = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse&remoteip=$userIp";

    $verify = @file_get_contents($url);
    $captchaSuccess = json_decode($verify);

    if (!$captchaSuccess || $captchaSuccess->success !== true) {
        die("<script>alert('Грешка: Моля, потвърдете, че не сте робот (reCAPTCHA).'); history.back();</script>");
    }
    // --- КРАЙ RECAPTCHA ПРОВЕРКА ---

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
                //Генерираме уникален токен
                $activationToken = bin2hex(random_bytes(16));
                //Генерираме INSERT заявката
                $querySQL = "INSERT INTO `users`(`name`, `family`, `email`, `password`, `city`, `activation_token`, `is_active`) 
                                VALUES ('$name','$family','$email','$passHashed', '$city', '$activationToken', 0)";
                $result = mysqli_query($conn, $querySQL);
                if ($result) {
                    // === ИЗПРАЩАНЕ НА ИМЕЙЛ ЗА ДОБРЕ ДОШЛИ ===


                    $activationLink = "http://sunnydays/activate.php?token=" . $activationToken;

                    $mail = new PHPMailer(true);

                    try {
                        // Настройки на сървъра
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = $config['smtp_username'];
                        $mail->Password   = $config['smtp_password']; // Вашият App Password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
                        $mail->Port       = $config['smtp_port'];
                        $mail->CharSet    = 'UTF-8';

                        // Получатели
                        $mail->setFrom($config['smtp_from_email'], $config['smtp_from_name']);
                        $mail->addAddress($email);

                        // Subject
                        $mail->isHTML(true);
                        $mail->Subject = 'Добре дошли! Aктивирайте профила си.';
                        
                        // HTML шаблон за имейла
                        $mail->Body    = "
                            <div style='font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px;'>
                                <h2 style='color: #2c3e50;'>Здравейте, $name!</h2>
                                <p>Благодарим ви за регистрацията. За да влезете в профила си, моля първо го активирайте чрез бутона по-долу:</p>
                                <br>
                                <a href='$activationLink' style='background-color: #27ae60; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;'>АКТИВИРАЙ ПРОФИЛА СИ</a>
                                <br><br>
                                <p>Ако бутонът не работи, копирайте този линк в браузъра си:</p>
                                <p>$activationLink</p>
                            </div>";

                        $mail->send();
                    } catch (Exception $e) {
                        // Не спираме регистрацията, ако само имейлът се провали, 
                        // но записваме грешката в лога за теб
                        error_log("Имейлът не можа да бъде изпратен. Mailer Error: {$mail->ErrorInfo}");
                    }

                    // Твоят съществуващ alert и пренасочване
                    echo    "<script> 
                                alert ('Регистрацията е успешна! Моля, проверете имейла си, за да активирате профила.');
                                document.location.href = '/login.php';
                            </script>";
                }
                if( empty($result) ){
                    $rformerror = true;
                }
            }
    }else{
        die('Има празно поле, Моля прегледайте всички полета');
    }
}
require_once 'views/reg-html.php';

?>