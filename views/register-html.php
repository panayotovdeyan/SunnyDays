<?php if( !defined('SunnyDays') ) exit();
$activemenu = 'account'; // $activemenu - за активна страница в header-html.php
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body>
    <main id="main">
    <!-- ======= Registration Section ======= -->
        <section class="inner-page" id=registerSection>
            <div class="reg-container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Регистрация</h2>
                </div>
                <br>
                <br>
                <form method="post" id="register-form" onsubmit="return setRegisterValue()"> 
                    
                    <input type="hidden" name="register" value="0" id="register">
                    <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token'] ?>" >
                    <div class="imput-wrapper">
                        <label for="regEmail">Имейл</label>
                        <input type="email" name="regEmail" id="regEmail" >
                        <small class="error"></small>
                    </div>
                    <br>
                    <div class="imput-wrapper reg-hidden">
                        <label for="firstName">Име</label>
                        <input type="text" name="firstName" id="firstName" >
                        <small class="error"></small>
                    </div>
                    <br>
                    <div class="imput-wrapper reg-hidden">
                        <label for="lastName">Фамилия</label>
                        <input type="text" name="lastName" id="lastName" >
                        <small class="error"></small>
                    </div>
                    <br>
                    <div class="imput-wrapper reg-hidden">
                        <label for="regCity" id="label">Град</label>
                        <select id="regCity" name="regCity">
                            <option value="" selected >Изберете</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="imput-wrapper reg-hidden">
                        <div class="password-container">
                        <label for="regPassword">Парола</label>
                        <input type="password" id="newPassword" name="new_password" required>
                        <img id="toggleNewPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" style="cursor:pointer; margin-left:5px;" />
                        <small class="error"></small>
                        </div>
                    </div>
                    <br>
                    <div class="imput-wrapper reg-hidden">
                        <label for="confirmPassword">Повтори паролата</label>
                        <input type="password" id="confirmPassword" name="confirm_password" required>
                        <img id="toggleConfirmPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" style="cursor:pointer; margin-left:5px;" />
                        <small class="error"></small>
                    </div>
                    <br>
                    <button class="btn btn-primary active reg" id="enterButtonGoOn" type="submit" onclick="document.getElementById('register').value=1;">Продължи</button>
                    <button class="btn btn-primary active reg" id="enterButtonReg" type="submit" style="display: none" onclick="document.getElementById('register').value=2;">Регистрирай</button>
                    <br>
                    <a id="enterButtonLogin" href='/login.php' class="btn btn-link reg-hidden reg">Вход/Влез</a>
                </form>
            </div>
            <br>
        </section><!-- End Inner Page -->
    </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>