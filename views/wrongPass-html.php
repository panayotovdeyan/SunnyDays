<?php 
define("SunnyDays", true);
session_start();

require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body>
    <main id="main">
        <!-- ======= Blog Section ======= -->
        <section class="inner-page">
            <div class="container" data-aos="fade-up">
            <h3>Въведохте грешен имейл или парола?</h3>
            <p>Моля опитайте отново или се регистрирайте!</p>
            <a button href="/login.php" type="button" class="btn btn-primary active"><h5>Вход</h5></a>
            <a button href="/reg.php" type="button" class="btn btn-primary active"><h5>Регистрация</h5></a>
            <br>
        </section>
    </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>