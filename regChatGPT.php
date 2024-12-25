<?php
session_start();
define("SunnyDays", true);

if (isset($_SESSION['loged']) && $_SESSION['loged']) {
    require_once 'profile.php';
    exit;
}

require_once 'includes/functions.php';

if (isset($_REQUEST['register']) && $_REQUEST['register'] == 1) {
    require_once 'includes/db_SunnyDays.php';

    // CSRF защита
    $csrf = cleanInput($_REQUEST['csrf_token']);
    if ($_SESSION['csrf_token'] != $csrf) {
        die("Невалиден CSRF токен.");
    }

    // Валидация на входа
    $email = filter_var(cleanInput($_REQUEST['regEmail']), FILTER_VALIDATE_EMAIL);
    $name = cleanInput($_REQUEST['firstName']);
    $family = cleanInput($_REQUEST['lastName']);
    $city = cleanInput($_REQUEST['regCity']);
    $pass = cleanInput($_REQUEST['regPassword']);
    $pass2 = cleanInput($_REQUEST['confirmPassword']);

    // Проверка за празни стойности
    if (empty($email) || empty($name) || empty($family) || empty($pass) || empty($pass2)) {
        die("Моля, попълнете всички полета.");
    }

    // Проверка за съвпадение на паролите
    if ($pass !== $pass2) {
        die("Паролите не съвпадат.");
    }

    // Хеширане на паролата
    $passHashed = password_hash($pass, PASSWORD_BCRYPT);
    if ($passHashed === false) {
        die("Грешка при хеширане на паролата.");
    }

    // Проверка за съществуващ потребител
    $stmt = $conn->prepare("SELECT userId FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        die("Потребител с този имейл вече съществува.");
    }
    $stmt->close();

    // Вмъкване на нов потребител
    $stmt = $conn->prepare("INSERT INTO users (name, family, email, password, city) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $family, $email, $passHashed, $city);
    if (!$stmt->execute()) {
        die("Грешка при запис в базата данни: " . $stmt->error);
    }
    $stmt->close();

    echo "Успешна регистрация! Моля, влезте в профила си.";
    ?>
    <a href="/login.php" class="btn btn-primary active"><h4>Вход</h4></a>
    <?php
    exit;
}

require_once 'views/register-html.php';
?>
