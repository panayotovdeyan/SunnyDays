<?php
// Изключваме показването на грешки директно на екрана, за да не развалим JSON формата
ini_set('display_errors', 0); 
error_reporting(E_ALL);

session_start();
define("SunnyDays", true);

// Път към базата данни и конфигурацията
require_once 'includes/db_SunnyDays.php';
$config = require 'C:/xampp/config-sunnydays.php';

header('Content-Type: application/json');
$response = ["success" => false, "message" => "Възникна неочаквана грешка."];

// Импорт на PHPMailer класовете
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Взимаме имейла и го почистваме
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
    
    // 1. Проверка на reCAPTCHA
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $config['recaptcha_secret_key'],
        'response' => $recaptchaResponse
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captchaSuccess = json_decode($verify);

    if (!$captchaSuccess->success) {
        $response["message"] = "Неуспешна проверка за ботове. Моля, опитайте пак.";
        echo json_encode($response);
        exit;
    }
    // Край на 1. Проверка на reCAPTCHA

    if (empty($email)) {
        $response["message"] = "Моля, въведете имейл адрес.";
        echo json_encode($response);
        exit;
    }

    // 2. Проверка дали имейлът съществува (Prepared Statement)
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        
        // 3. Генериране на токен
        $token = bin2hex(random_bytes(32));
        
        // 4. Запис на токена в базата (Използваме REPLACE или първо DELETE, за да няма стари токени)
        $delStmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
        $delStmt->bind_param("s", $email);
        $delStmt->execute();

        $insStmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $insStmt->bind_param("ss", $email, $token);
        
        if ($insStmt->execute()) {
            
            // 5. Изпращане на имейл с PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Настройки на сървъра
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = $config['smtp_username'];
                $mail->Password   = $config['smtp_password']; // Вашият App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
                $mail->Port       = 465;
                $mail->CharSet    = 'UTF-8';

                // Получатели
                $mail->setFrom($config['smtp_from_email'], $config['smtp_from_name']);
                $mail->addAddress($email);

                // Съдържание
                $resetLink = "http://sunnydays/reset-password.php?token=$token";
                $mail->isHTML(true);
                $mail->Subject = 'Възстановяване на парола - SunnyDays';
                $mail->Body    = "
                    <div style='font-family: Arial, sans-serif; border: 1px solid #eee; padding: 20px; max-width: 600px;'>
                        <h2 style='color: #ed5b5b;'>Забравена парола?</h2>
                        <p>Здравейте, получихме заявка за нова парола за вашия профил.</p>
                        <p>Кликнете върху бутона по-долу, за да я смените. Този линк е валиден 1 час:</p>
                        <a href='$resetLink' style='display: inline-block; padding: 10px 20px; background-color: #ed5b5b; color: #fff; text-decoration: none; border-radius: 5px;'>Смяна на паролата</a>
                        <p style='margin-top: 20px; font-size: 12px; color: #777;'>Ако не сте поискали тази промяна, можете спокойно да игнорирате този имейл.</p>
                    </div>";
                
                $mail->AltBody = "За да смените паролата си, посетете този адрес: $resetLink";

                $mail->send();
                $response["success"] = true;
                $response["message"] = "Инструкции за смяна на паролата са изпратени на вашия имейл.";
                
            } catch (Exception $e) {
                $response["message"] = "Грешка при изпращане на имейла. Моля, опитайте по-късно.";
                // За дебъгване (само в лог): $e->getMessage();
            }
        } else {
            $response["message"] = "Грешка при запис в базата данни.";
        }
    } else {
        // За сигурност е по-добре да не казваме "Имейлът не съществува", 
        // но за нуждите на проекта тук го оставяме така:
        $response["message"] = "Този имейл адрес не е намерен в нашата система.";
    }
}

echo json_encode($response);
exit;