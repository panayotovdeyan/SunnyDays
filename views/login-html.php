<?php if( !defined('SunnyDays') ) exit(); ?>

<?php
require_once 'head-html.php';
$activemenu = 'login'; // $activemenu - за активна страница
?>
<body>
    <?php require_once 'header-html.php'; ?>

    <main id="main">

    <!-- ======= Section Login ======= -->
    <style>
    #login-form .imput-wrapper label { width:100px; display: inline-block; }
    </style>
    <section class="inner-page" id="loginSection">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Вход</h2>
          <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
            }
            h2 {
            color: #333333;
            position: relative;
            left: 105px;
            }
            /* Additional CSS rules go here */
        </style>
        </div>
        <br>
        <div class="col-lg-6">
            <form method="post" id="login-form">
              <input type="hidden" name="login" value="0" id="login">
              <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token'] ?>" >
                <div class="imput-wrapper">
                    <label for="email">Имейл</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <br>
                <div class="imput-wrapper">
                    <label for="password">Парола</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <br>
                <button class="btn btn-primary active" id="enterButton" type="submit" onclick="document.getElementById('login').value=1;">Влез</button>
                <style>
                #enterButton {
                position: relative;
                top: 10px;
                left: 105px;
                }
                </style>
                <br>
                <br>
                <a id="enterButton" style="font-weight: bold"; href='/reg.php' class="btn btn-link">Регистрация</a>
            </form>
    <br>
      </div>
    </section><!-- End Inner Page -->

  </main><!-- End #main -->

  <?php require_once 'footer-html.php'; ?>