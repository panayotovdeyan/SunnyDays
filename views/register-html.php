<?php if( !defined('SunnyDays') ) exit(); ?>

<?php
require_once 'head-html.php';
$activemenu = 'account'; // $activemenu - за активна страница в header-html.php
?>
<body>
    <?php require_once 'header-html.php'; ?>

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
                        <input type="password" name="regPassword" id="regPassword" >
                        <img src="assets/img/Icons/visibility_18dp_000000.svg" alt="Показване на паролата" class="toggle-password eye-icon" id="toggleRegPassword">
                        <small class="error"></small>
                    </div>
                </div>
                <br>
                <div class="imput-wrapper reg-hidden">
                    <label for="confirmPassword">Повтори паролата</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" >
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

    <?php require_once 'footer-html.php'; ?>