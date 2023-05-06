<?php if( !defined('cmsdp') ) exit(); ?>

<?php require_once 'C:\xampp\htdocs\cmsdp\views\head-html.php'; 
$activemenu = 'services'; // $activemenu - за активна страница
?>

  <body>
    <?php require_once 'C:\xampp\htdocs\cmsdp\views\header-html.php'; ?>

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <span>Услуги</span>
          <h2>Услуги</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-8 d-flex align-items-stretch" data-aos="fade-up">
            <a href="/menu/service/service_1.php">
             <div class="icon-box">
                <div class="icon"><i class="bx bx-home"></i></div>
                <h4><a><?php echo $service1->service_name ?></a></h4>
                <p><?php echo $service1->service_subname ?></p>
              </div>
            </a>
          </div>

          <div class="col-lg-6 col-md-8 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
          <a 
          <?php
              if (isset($_SESSION ['loged']) && ($_SESSION ['loged']) == true){
                  ?>href="/profile.php"></a>
              <?php
              }else{
                  ?><a href="/menu/service/service_2.php"></a>
              <?php
              }
              ?>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a 
              <?php
              if (isset($_SESSION ['loged']) && ($_SESSION ['loged']) == true){
                  ?>href="/profile.php"><?php echo $service2->service_name ?></a></h4>
              <?php
              }else{
                  ?><a href="/menu/service/service_2.php"><?php echo $service2->service_name ?></a></h4>
              <?php
              }
              ?>
              <p><?php echo $service2->service_subname ?></p>
            </div>
          </a>
          </div>

          <a href="/menu/service/service_3.php">
          <div class="col-lg-6 col-md-8 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="450">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-support"></i></div>
              <h4><a><?php echo $service3->service_name ?></a></h4>
                <p><?php echo $service3->service_subname ?></p>
            </div>
          </div>
          </a>

        </div>
      </div>
    </section><!-- End Services Section -->

  <section class="inner-page">
    <div class="container">
      <p>Ние проектираме и изграждаме соларни централи от всякакъв размер и тип. Вниманието към детайлите, голям опит и оборудване от висок клас ни позволяват да гарантираме ефективността на нашите фотоволтаични системи в продължение на много години.
      </p>
    </div>
  </section>

  </main><!-- End #main -->


  <?php require_once 'C:\xampp\htdocs\cmsdp\views\footer-html.php'; ?>