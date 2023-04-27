<?php if( !defined('cmsdp') ) exit(); ?>

<?php require_once 'C:\xampp\htdocs\cmsdp\views\head-html.php'; 
$activemenu = 'services'; // $activemenu - за активна страница
?>

  <body>
    <?php require_once 'C:\xampp\htdocs\cmsdp\views\header-html.php'; ?>

  <main id="main">
    <!-- ======= Services Section 1 ======= -->
    <section id="services2" style class="inner-page" data-aos="fade-up">

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


  <?php require_once 'C:\xampp\htdocs\cmsdp\views\footer-html.php'; ?>