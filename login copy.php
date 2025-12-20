<?php
session_start();
define("SunnyDays", true);

// flash helpers
function flash_alert($msg) {
    $_SESSION['flash_alert'] = $msg;
}

function show_flash_alert_and_clear() {
    if (!empty($_SESSION['flash_alert'])) {
        $msg = json_encode($_SESSION['flash_alert'], JSON_UNESCAPED_UNICODE);
        echo "<script>alert($msg);</script>";
        unset($_SESSION['flash_alert']);
    }
}


require_once 'includes/functions.php';
require_once 'includes/db_SunnyDays.php';

// инициализация на сесия
if (!isset($_SESSION['wrong_logins'])) {
    $_SESSION['wrong_logins'] = 0;
}
if (!isset($_SESSION['lock_until'])) {
    $_SESSION['lock_until'] = 0;
}

$formerror = false;
$loged = false;

if (isset($_REQUEST['login']) && $_REQUEST['login'] == 1) {
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if ($_SESSION['csrf_token'] != $csrf) {
        die("CSRF error!");
    }

    $pass = mysqli_real_escape_string($conn, cleanInput($_REQUEST['loginPassword']));
    $email = mysqli_real_escape_string($conn, cleanInput($_REQUEST['email']));
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!empty($email) && !empty($pass)) {
        $querySQL = "SELECT userId, name, family, email, password, city, admin, regDate,
                            failed_attempts, lock_until
                     FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $querySQL);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            // 🔒 Проверка дали акаунтът е заключен в базата
            if (time() < (int)$data['lock_until']) {
                $wait = ceil(($data['lock_until'] - time()) / 60);
                die("<script>
                    alert('Акаунтът ви е заключен за още $wait минути.');
                    document.location.href = 'index.php';
                </script>");
            }

            // Проверка на парола
            if (password_verify($pass, $data['password'])) {
                // ✅ Успешен вход → нулираме и в сесия, и в база
                $loged = true;
                $_SESSION['wrong_logins'] = 0;
                $_SESSION['lock_until'] = 0;

                $updateSQL = "UPDATE users 
                              SET failed_attempts = 0, lock_until = 0 
                              WHERE userId = {$data['userId']}";
                mysqli_query($conn, $updateSQL);

                $_SESSION['user'] = [
                    'userId' => $data['userId'],
                    'name'   => $data['name'],
                    'family' => $data['family'],
                    'email'  => $data['email'],
                    'admin'  => $data['admin'],
                    'city'   => $data['city'],
                    'regDate'=> $data['regDate']
                ];
            } else {
                // ❌ Грешна парола → увеличаваме опитите и в сесия, и в база
                $_SESSION['wrong_logins']++;
                $attempts = (int)$data['failed_attempts'] + 1;
                $lock_until = 0;

                // Сесийни предупреждения
                if ($_SESSION['wrong_logins'] == 3) {
                    flash_alert('Имате още 3 (три) опита!');
                } elseif ($_SESSION['wrong_logins'] == 4) {
                    flash_alert('Имате още 2 (два) опита!');
                } elseif ($_SESSION['wrong_logins'] == 5) {
                    flash_alert('Последен опит! След това акаунтът ще бъде заключен за 15 минути.');
                }


                // Заключване след 6-ти опит
                if ($attempts > 5) {
                    $lock_until = time() + (15 * 60); // заключване за 15 минути
                    $attempts = 0; // нулираме брояча в базата
                    $_SESSION['wrong_logins'] = 0; // и в сесията
                    $_SESSION['lock_until'] = $lock_until;

                    $updateSQL = "UPDATE users 
                                  SET failed_attempts = $attempts, lock_until = $lock_until 
                                  WHERE userId = {$data['userId']}";
                    mysqli_query($conn, $updateSQL);

                    flash_alert('Изчерпахте опитите си! Акаунтът е заключен за 15 минути.');
                    header('Location: index.php');
                    exit;

                } else {
                    // Записваме само брояча
                    $updateSQL = "UPDATE users 
                                  SET failed_attempts = $attempts 
                                  WHERE userId = {$data['userId']}";
                    mysqli_query($conn, $updateSQL);
                }

                $formerror = true;
            }
        } else {
            $formerror = true;
        }
    } else {
        $formerror = true;
    }
}

if ($formerror) {
    header('Location: views/wrongPass-html.php');
    exit;
}

if ($loged) {
    if ($_SESSION['user']['admin'] == 1) {
        header('Location: admin/index.php');
    } else {
        header('Location: profile.php');
    }
    exit;
}

include_once 'views/login-html.php';
