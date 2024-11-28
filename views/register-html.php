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
            <label for="" id="label">Име<a style="color: red;">*</a></label>
            <input id="input" type="text" name="firstName" maxlength="21" required>
            <small class="error"></small>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="" id="label">Фамилия</label>
            <input id="input" type="text" name="lastName" maxlength="21">
            <small class="error"></small>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="city-select" id="label">Град</label>
            <select id="city-select">
                <option value="" selected >Изберете</option>
            </select>
        </div>
        <br>
        <br>
        <div class="imput-wrapper">
            <label for="" id="label">Парола<a style="color: red;">*</a></label>
            <input id="input" type="password" name="password" required>
            <span id="toggle-password" class="password-wrapper eye-icon">&#128065;</span> <!-- Икона за око -->
            <small class="error"></small>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="" id="label">Повтори паролата</label>
            <input id="input" type="password"  name="confirmPassword" required>
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