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
        <h2><a><?php echo $service2->service_name ?></a></h2>
        <br>
        <h4><a><?php echo $service2->service_subname ?></a></h4>
        <br>
        <p><?php echo $service2->service_description ?></p>
        <br>
        <center>
          <div data-aos="fade-up" data-aos-delay="450">
            <video autoplay="" hide-on-mobile="" loop="" muted="" playsinline="" preload="metadata" width="50%">
            <?php echo "<source src='" . $service2->service_image . "'>";?>>
            </video>
          </div>
        </center>
      </div>

    </section><!-- End Services Section -->

  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>