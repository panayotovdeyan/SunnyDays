<?php if( !defined('SunnyDays') ) exit(); ?>

<?php 
require_once __DIR__ . '/../../config.php';
$activemenu = 'services';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>

  <body>
    <?php require_once 'C:\xampp\htdocs\SunnyDays\views\header-html.php'; ?>

  <main id="main">
    <!-- ======= Services Section 1 ======= -->
    <section id="services" style class="inner-page" data-aos="fade-up">

      <div class="container">
      <h2><a><?php echo $service6->service_name ?></a></h2>
        <br>
        <h4><a><?php echo $service6->service_subname ?></a></h4>
        <br>
        <p><?php echo $service6->service_description ?></p>
        <br>
        <center><?php echo "<img src='" . $service6->service_image . "' style='width: auto';>"; ?></center>
      </div>

    </section><!-- End Services Section -->

  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>