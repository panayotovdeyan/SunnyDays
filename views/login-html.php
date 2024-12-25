<?php if( !defined('SunnyDays') ) exit(); ?>

<?php
require_once 'head-html.php';
$activemenu = 'login'; // $activemenu - за активна страница
?>
<body>
    <?php require_once 'header-html.php'; ?>

    <main id="main">

    <!-- ======= Section Login ======= -->
    <section class="inner-page" id="loginSection">
      <div class="login-container" data-aos="fade-up">
        <div class="section-header">
          <h2>Вход</h2>
        </div>
        <div class="col-lg-6">
            <form method="post" id="login-form">
              <input type="hidden" name="login" value="0" id="login">
              <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token'] ?>" >
                <div class="imput-wrapper">
                  <label for="email">Имейл</label>
                  <input type="email" name="email" id="email" required>
                </div>
                <div class="imput-wrapper">
                  <label for="loginPassword" id="label">Парола<a style="color: red;">*</a></label>
                  <div class="password-container">
                      <input type="password" name="loginPassword" id="loginPassword" required>
                      <img src="assets/img/Icons/visibility_18dp_000000.svg" alt="Показване на паролата" class="toggle-password" id="toggleLoginPassword">
                  </div>
                  <small class="error"></small>
                </div>                
                <button class="btn btn-primary active login" id="enterButtonLogin" type="submit" onclick="document.getElementById('login').value=1;">Влез</button>
                <a id="enterButtonReg" class="btn btn-link login">Регистрация</a>
            </form>
        </div>
      </div>
    </section><!-- End Inner Page -->
  </main><!-- End #main -->
</body>

<?php require_once 'footer-html.php'; ?>