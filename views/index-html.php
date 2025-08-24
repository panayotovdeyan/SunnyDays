<?php if( !defined('SunnyDays') ) exit();
$activemenu = 'homepage'; // $activemenu - за активна страница
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body>
  <main id="main">
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container position-relative" data-aos="fade-up" data-aos-delay="200">
        <h1>Добре дошли в SUNNY DAYS</h1>
        <h2>Изграждане, ремонт и поддръжка на фотоволтаични системи и конструкции.<br>
        Анализ на добива и потреблението, чрез WEB базирано решение за наблюдение на данните в реално време</h2>
        <a href="menu/about.php" class="btn-get-started scrollto">Вижте повече</a>
      </div>
    </section><!-- End Hero -->
  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>