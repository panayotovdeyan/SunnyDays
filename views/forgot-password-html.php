<?php
if( !defined('SunnyDays') ) exit();

require_once 'head-html.php'; 
$activemenu = 'account'; // $activemenu - за активна страница
require_once 'header-html.php';
?>

  <main id="main">

    <!-- ======= Section forgotPassword ======= -->
    <section class="inner-page" id="forgotPasswordSection">

      <form id="forgotPasswordForm" method="POST">
        <label for="email">Въведете вашия имейл:</label>
          <br><br>
        <input type="email" id="email" name="email" required>
          <br><br>
        <button class="btn btn-primary active" id="forgotPasswordBtn" type="submit">Нова парола</button>
      </form>

    </section><!-- End Section forgotPassword -->
    
  </main><!-- End #main -->

  <?php require_once 'footer-html.php'; ?>