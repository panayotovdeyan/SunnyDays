<?php if( !defined('SunnyDays') ) exit(); ?>

<?php 
require_once __DIR__ . '/../../config.php';
$activemenu = 'services';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>

  <body>

  <main id="main">
    <!-- ======= Services Section 1 ======= -->
    <section id="services" style class="inner-page" data-aos="fade-up">

      <div class="container">
        <center><h2><a><?php echo $service1->service_name ?></a></h2></center>
        <br>
        <h4><a><?php echo $service1->service_subname ?></a></h4>
        <br>
        <p><?php echo $service1->service_description ?></p>
        <br>
        <center><?php echo "<img src='" . $service1->service_image . "' style='width: 70%;'>";?></center>
     </div>


    </section><!-- End Services Section -->
    <br>
        <br>

  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>