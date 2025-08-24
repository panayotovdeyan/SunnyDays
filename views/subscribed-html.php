<?php if( !defined('SunnyDays') ) exit(); 
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body>
    <main id="main">

    <!-- ======= Subscribed Section ======= -->
    <section class="inner-page">
        <div class="container" data-aos="fade-up">
        <br>
        <h3>Вие се абонирахте успешно за нашият месечен Бюлетин</h3>
        <a href="/" class="btn btn-primary active">Начало</a>
        </div>
        <br>
    </section><!-- End Inner Page -->

    </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>