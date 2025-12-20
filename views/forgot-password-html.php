<?php
if( !defined('SunnyDays') ) exit();
$activemenu = 'account'; // $activemenu - за активна страница
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>

  <main id="main">

    <!-- ======= Section forgotPassword ======= -->
    <section class="inner-page" id="forgotPasswordSection">
      <div class="forgot-container" data-aos="fade-up">
        <form id="forgotPasswordForm" method="POST">
          <label for="email">Въведете вашият имейл:</label>
            <br><br>
          <input type="email" id="email" name="email" required>
            <br><br>
          <button class="btn btn-primary active" id="forgotPasswordBtn" type="submit">Нова парола</button>
        </form>
        <!-- Preloader (скрит по начало) -->
        <div id="form-preloader" style="display:none;"></div>
      </div>

    </section><!-- End Section forgotPassword -->
    
  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>