<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
define("SunnyDays", true);

require_once 'includes/db_SunnyDays.php';
$config = require 'C:/xampp/config-sunnydays.php';

header('Content-Type: application/json');
$response = ["success" => false, "message" => "Нещо се обърка."];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));

    if (!empty($email)) {
        $sqlCheckEmail = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sqlCheckEmail);

        if ($result && mysqli_num_rows($result) > 0) {
            // Генериране на токен
            $token = bin2hex(random_bytes(32));
            $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

            // Запис в базата
            $sqlInsertToken = "INSERT INTO password_resets (email, token, created_at, expires_at) 
                VALUES ('$email', '$token', NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR))";
            mysqli_query($conn, $sqlInsertToken);

            // === Изпращане на имейла (вътре в условието)
            require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/Exception.php';
            require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/PHPMailer.php';
            require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/SMTP.php';

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = $config['smtp_username'];
                $mail->Password   = $config['smtp_password'];
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;
                $mail->CharSet    = 'UTF-8';

                $mail->setFrom($config['smtp_from_email'], $config['smtp_from_name']);
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Генериране на нова парола';
                $resetLink = "http://sunnydays/reset-password.php?token=$token";
                $mail->Body    = "Здравей,<br><br>Кликни върху линкa, за да създадеш нова парола:<br><a href='$resetLink'>$resetLink</a><br><br>Поздрави,<br>Екипът на SunnyDays";

                $mail->send();
                $response = ["success" => true, "message" => "Проверете имейла си за генериране на нова парола."];
            } catch (Exception $e) {
                $response["message"] = "Имейлът не беше изпратен. Грешка: {$mail->ErrorInfo}";
            }

        } else {
            $response["message"] = "Имейлът не е регистриран.";
        }
    } else {
        $response["message"] = "Моля, въведете имейл.";
    }
}

echo json_encode($response);
exit;

?>