<?php 
if( !defined('SunnyDays') ) exit();
$activemenu = 'account'; 

// 1. Зареждаме основната конфигурация (за PROJECT_ROOT)
require_once __DIR__ . '/../config.php';

// 2. Зареждаме конфигурацията за ключовете на reCAPTCHA
$config = require 'C:/xampp/config-sunnydays.php'; 

require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<body>
    <main id="main">
        <section class="inner-page" id="registerSection">
            <div class="reg-container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Регистрация</h2>
                </div>
                <br><br>
                
                <form method="post" id="register-form" onsubmit="return validateRegForm()"> 
                    
                    <input type="hidden" name="register" value="0" id="register">
                    <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token'] ?>" >

                    <div class="input-wrapper">
                        <label for="regEmail">Email</label>
                        <input class="form-control" type="email" name="regEmail" id="regEmail" required>
                    </div>

                    <div class="input-wrapper reg-hidden">
                        <label for="firstName">Име</label>
                        <input class="form-control" type="text" name="firstName" id="firstName">
                        <small class="error"></small>
                    </div>

                    <div class="input-wrapper reg-hidden">
                        <label for="lastName">Фамилия</label>
                        <input class="form-control" type="text" name="lastName" id="lastName">
                        <small class="error"></small>
                    </div>

                    <div class="input-wrapper reg-hidden">
                        <label for="regCity" id="label">Град</label>
                        <select class="form-control" id="regCity" name="regCity">
                            <option value="" selected>Изберете</option>
                        </select>
                    </div>

                    <div class="input-wrapper reg-hidden">
                        <label for="newPassword">Парола</label>
                        <div class="password-container">
                            <input class="form-control" type="password" id="newPassword" name="regPassword" required>
                            <img id="toggleNewPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" />
                        </div>
                        <small class="error"></small>
                    </div>

                    <div class="input-wrapper reg-hidden">
                        <label for="confirmPassword">Повтори паролата</label>
                        <div class="password-container">
                            <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" required>
                            <img id="toggleConfirmPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" />
                        </div>
                        <small class="error"></small>
                    </div>

                    <div class="g-recaptcha mt-3 mb-3 reg-hidden" data-sitekey="<?php echo $config['recaptcha_site_key']; ?>"></div>


                    <button class="btn btn-primary active reg" id="enterButtonGoOn" type="submit" onclick="document.getElementById('register').value=1;">Продължи</button>

                        <button class="btn btn-primary active reg" id="enterButtonReg" type="submit" style="display: none" onclick="document.getElementById('register').value=2;">Регистрирай</button>
                        <br>
                        <a id="enterButtonLogin" href='/login.php' class="btn btn-link reg-hidden reg">Вход за регистрирани потребители</a>
                </form>
            </div>

        </section></main><?php 
    require_once PROJECT_ROOT . '/views/footer-html.php'; 
    ?>
</body>