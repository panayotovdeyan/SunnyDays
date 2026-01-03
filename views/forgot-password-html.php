<?php
if( !defined('SunnyDays') ) exit();

// 1. Първо зареждаме основната конфигурация, където е дефиниран PROJECT_ROOT
require_once __DIR__ . '/../config.php';

// 2. След това зареждаме ключовете за reCAPTCHA
$config = require 'C:/xampp/config-sunnydays.php';

$activemenu = 'account';

// 3. Сега вече можем да използваме PROJECT_ROOT без грешка
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<body>
  <main id="main">

    <section class="inner-page" id="forgotPasswordSection">
      <div class="forgot-container form-group" data-aos="fade-up">
        <form id="forgotPasswordForm" method="POST">
            <label for="regEmail">Въведете вашият имейл:</label>
            <input class="form-control" type="email" id="email" name='regEmail' required>
            <div class="error" style="color: red; font-size: 0.85rem; min-height: 20px;"></div>
            <div class="g-recaptcha mt-3 mb-3" data-sitekey="<?php echo $config['recaptcha_site_key']; ?>"></div>
            
            <button class="btn btn-primary active" id="forgotPasswordBtn" type="submit">Нова парола</button>
        </form>
        
        <div id="form-preloader" style="display:none;"></div>
      </div>
    </section></main><?php 
  // Тук също използваме PROJECT_ROOT
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>