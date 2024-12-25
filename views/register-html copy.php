<?php if( !defined('SunnyDays') ) exit(); ?>

<?php
require_once 'head-html.php';
$activemenu = 'reg'; // $activemenu - за активна страница
?>
<body>
    <?php require_once 'header-html.php'; ?>

    <main id="main">

    <!-- ======= Registration Section ======= -->
    <style>
    /* #register-form {display: none} */
    #register-form .imput-wrapper label { width:200px; display: inline-block; }
    </style>
    <section class="inner-page" id=registerSection>
        <div class="container" data-aos="fade-up">

    <br>
    <form method="post" id="register-form" name="registration">
        
        <input type="hidden" name="register" value="0" id="register">
        <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token'] ?>" >

        <div class="imput-wrapper">
            <label for="registerEmail">Email<a style="color: red;">*</a></label>
            <input type="email" name="registerEmail" id="registerEmail" required>
            <small class="error"></small>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="firstName" id="label">Име<a style="color: red;">*</a></label>
            <input id="firstName" type="text" name="firstName" maxlength="21" required>
            <small class="error"></small>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="lastName" id="label">Фамилия</label>
            <input id="lastName" type="text" name="lastName" maxlength="21">
            <small class="error"></small>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="regCity" id="label">Град</label>
            <select id="regCity" name="regCity">
                <option value="" selected >Изберете</option>
            </select>
        </div>
        <br>
        <br>
        <div class="imput-wrapper">
            <label for="registerPassword" id="label">Парола
                <a style="color: red;">*</a>
                <a class="passInfo"><img src="../assets/img/Icons/info_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg"></a>
            </label>
            <input id="registerPassword" type="password" name="password" required>
            <span id="toggle-password" class="password-wrapper eye-icon">&#128065;</span> <!-- Икона за око -->
            <small class="error"></small>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="confirmPassword" id="label">Повтори паролата</label>
            <input id="confirmPassword" type="password"  name="confirmPassword" required>
            <small class="error"></small>
        </div>
        <br>
        <button class="btn btn-primary active" id="enterButtonReg" type="submit" onclick="document.getElementById('register').value=1;">Регистрирай</button>
        <br>
        <br>
        <a id="enterButtonLogin" style="color: orange;" class="btn btn-link">Вход/Влез</a>
    </form>
    <br>
    </section><!-- End Inner Page -->

    </main><!-- End #main -->
    
    <?php require_once 'footer-html.php'; ?>