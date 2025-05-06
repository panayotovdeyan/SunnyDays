<?php if( !defined('SunnyDays') ) exit(); ?>

<?php
require_once 'head-html.php';
$activemenu = 'account'; // $activemenu - за активна страница в header-html.php
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
                <div class="imput-wrapper email">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="loginEmail" required>
                </div>
                <div class="imput-wrapper">
                  <label for="loginPassword" id="label">Password<a style="color: red;">*</a></label>
                  <div class="password-container">
                      <input type="password" name="loginPassword" id="loginPassword" required>
                      <img src="assets/img/Icons/visibility_18dp_000000.svg" alt="Показване на паролата" class="toggle-password" id="toggleLoginPassword">
                  </div>
                  <small class="error"></small>
                </div>                
                <button class="btn btn-primary active login" id="enterButtonLogin" type="submit" onclick="document.getElementById('login').value=1;">Влез</button>
                <a href="/forgot-password-view.php" id="forgotPasswordBtn" class="btn btn-link login">Забравена парола</a>
                <a href="/reg.php" id="enterButtonReg" class="btn btn-link login">Регистрация</a>
            </form>
        </div>
      </div>
    </section><!-- End Inner Page -->
  </main><!-- End #main -->
</body>

<?php require_once 'footer-html.php'; ?>