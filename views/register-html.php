<?php if( !defined('cmsdp') ) exit(); ?>

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
    <form method="post" id="register-form"> 
        
        <input type="hidden" name="register" value="0" id="register">
        <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token'] ?>" >
        
        <div class="imput-wrapper">
            <label for="register_name">Име</label>
            <input type="text" name="register_name" id="register_name" required>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="register_family">Фамилия</label>
            <input type="text" name="register_family" id="register_family" required>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="register_email">Имейл</label>
            <input type="email" name="register_email" id="register_email" required>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="register_password">Парола</label>
            <input type="password" name="register_password" id="register_password" required>
        </div>
        <br>
        <div class="imput-wrapper">
            <label for="register_password2">Повтори паролата</label>
            <input type="password" name="register_password2" id="register_password2" required>
        </div>
        <br>
        <button class="btn btn-primary active" id="enterButton" type="submit" onclick="document.getElementById('register').value=1;">Регистрирай</button>
        <style>
        #enterButton {
        position: relative;
        top: 10px;
        left: 230px;
        }
        </style>
        <br>
        <br>
        <a id="enterButton" style="color: orange; font-weight: bold;" href='/login.php' class="btn btn-link">Вход/Влез</a>
    </form>
    <br>
    </section><!-- End Inner Page -->

    </main><!-- End #main -->

    <?php require_once 'footer-html.php'; ?>