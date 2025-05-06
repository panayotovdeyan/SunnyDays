<?php
session_start();
define("SunnyDays", true);
require_once 'includes/db_SunnyDays.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = $_GET['token'] ?? '';

    if (empty($token)) {
        echo "Невалиден линк.";
        exit;
    }

    // Проверка за токена в базата
    $query = "SELECT email FROM password_resets WHERE token = '$token' AND expires_at > NOW()";
    $result = mysqli_query($conn, $query);
    if (!$result || mysqli_num_rows($result) === 0) {
        echo "Линкът е невалиден или е изтекъл.";
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    ?>

    <!-- HTML форма за нова парола -->
    <form method="POST" action="reset-password.php">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <label>Нова парола:</label><br>
        <input type="password" name="new_password" required><br><br>
        <button type="submit" name="reset">Смени паролата</button>
    </form>

    <?php
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    if (!empty($token) && !empty($newPassword)) {
        $query = "SELECT email FROM password_resets WHERE token = '$token' AND expires_at > NOW()";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $email = mysqli_fetch_assoc($result)['email'];

            // Хеширане на новата парола
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Обновяване на паролата
            $update = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            mysqli_query($conn, $update);

            // Изтриване на токена
            mysqli_query($conn, "DELETE FROM password_resets WHERE email = '$email'");

            echo "Паролата е сменена успешно. <a href='login.php'>Вход</a>";
            exit;
        } else {
            echo "Невалиден токен.";
        }
    } else {
        echo "Моля, въведете нова парола.";
    }
}
?>
