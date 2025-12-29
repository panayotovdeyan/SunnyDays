<?php
session_start();
define("SunnyDays", true);
require_once 'includes/db_SunnyDays.php';

if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);

    // Проверяваме дали има потребител с този токен
    $sql = "SELECT * FROM users WHERE activation_token = '$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Активираме потребителя и изтриваме токена
        $updateSql = "UPDATE users SET is_active = 1, activation_token = NULL WHERE activation_token = '$token'";
        if (mysqli_query($conn, $updateSql)) {
            echo "<script>
                    alert('Профилът ви е активиран успешно! Вече можете да влезете.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Невалиден или вече използван код за активация.');
                window.location.href = 'login.php';
              </script>";
    }
} else {
    header("Location: login.php");
}