<?php
session_start();
define("SunnyDays", true);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/sunnydays/PHPMailer/src/SMTP.php';
$config = require 'C:/xampp/config-sunnydays.php';

if(isset($_POST['send'])) {


    $name = htmlentities(trim($_POST['name']));
    $email = htmlentities($_POST['email']);
    $phone = htmlentities(trim($_POST['phone']));
    $adress = htmlentities($_POST['adress']);
    $consume = htmlentities($_POST['consume']);
    $quadrature = htmlentities($_POST['quadrature']);
    $subject = "From SunnyDays <Offer form>";
    $subjectClient = "Запитване";
    $message = htmlentities($_POST['message']);
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // --- Валидация на прикачения файл ---
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] !== UPLOAD_ERR_NO_FILE) {
        
        $file = $_FILES['attachment'];
        $maxSize = 10 * 1024 * 1024; // 10 MB в байтове
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        // 1. Проверка за грешки при качването
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "<script>alert('Грешка при качване на файла.'); window.history.back();</script>";
            exit;
        }

        // 2. Проверка за размер
        if ($file['size'] > $maxSize) {
            echo "<script>alert('Файлът е твърде голям! Максималният размер е 5MB.'); window.history.back();</script>";
            exit;
        }

        // 3. Проверка за тип (разширение)
        if (!in_array($file['type'], $allowedTypes)) {
            echo "<script>alert('Недопустим формат! Моля, качете JPG, PNG, PDF или Word документ.'); window.history.back();</script>";
            exit;
        }

        // Ако всичко е наред - прикачваме
        $mail->addAttachment($file['tmp_name'], $file['name']);
    }

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $config['smtp_username'];               //SMTP username
    $mail->Password   = $config['smtp_password'];               //SMTP password //Real is in Google Account
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
    $mail->isHTML(true);                                        //Set email format to HTML
    
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom($config['smtp_from_email'], $name);
    $mail->addAddress($config['smtp_username']);             //Add a recipient
    $mail->addCC($email);
    $mail->addReplyTo($email, $name);

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->Subject = ("$subject ($subjectClient от $name - $email)");

    // --- Подготовка на съдържанието на имейла ---
    $mail->Body = "
        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; border: 1px solid #ddd; padding: 20px;'>
            <h2 style='color: #ed5b5b; border-bottom: 2px solid #ed5b5b; padding-bottom: 10px;'>Ново запитване за оферта</h2>
            <p>Здравейте, получено е ново запитване от уебсайта <strong>SunnyDays</strong>.</p>
            
            <table style='width: 100%; border-collapse: collapse; margin-top: 20px;'>
                <tr style='background-color: #f9f9f9;'>
                    <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold; width: 40%;'>Име:</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>$name</td>
                </tr>
                <tr>
                    <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Email:</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'><a href='mailto:$email'>$email</a></td>
                </tr>
                <tr style='background-color: #f9f9f9;'>
                    <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Телефон:</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>$phone</td>
                </tr>
                <tr>
                    <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Адрес:</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>$adress</td>
                </tr>
                <tr style='background-color: #f9f9f9;'>
                    <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Месечна консумация:</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>$consume kw/h</td>
                </tr>
                <tr>
                    <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Квадратура на покрива:</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>$quadrature кв.м.</td>
                </tr>
            </table>

            <div style='margin-top: 20px; padding: 15px; background-color: #fff8f8; border-left: 4px solid #ed5b5b;'>
                <strong>Коментар от клиента:</strong><br>
                " . ($message ? nl2br($message) : "<em>Няма добавен коментар.</em>") . "
            </div>

            <p style='font-size: 12px; color: #888; margin-top: 30px; text-align: center; border-top: 1px solid #eee; padding-top: 10px;'>
                Това съобщение е изпратено автоматично от формата за контакти на SunnyDays.
            </p>
        </div>
    ";

    // Опционално: Текст за клиенти, които не поддържат HTML (AltBody)
    $mail->AltBody = "Ново запитване от: $name\nEmail: $email\nТелефон: $phone\nАдрес: $adress\nКонсумация: $consume\nКвадратура: $quadrature\nКоментар: $message";


    $mail->send();

    echo "<script> 
    alert ('Запитването за оферта е изпратено успешно')
    document.location.href = 'index.php';
    </script>";
}
?>