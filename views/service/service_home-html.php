<?php if( !defined('SunnyDays') ) exit(); ?>

<?php 
require_once 'C:\xampp\htdocs\SunnyDays\views\head-services-html.php'; 
$activemenu = 'services'; // $activemenu - за активна страница
require_once 'C:\xampp\htdocs\SunnyDays\views\header-html.php';
?>
<body>
  <main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services" data-aos="fade-up">
      <div class="container">
        <div class="section-title">
          <span>Услуги</span>
          <h2>Услуги</h2>
        </div>

        <div class="containerService" data-aos="fade-up" data-aos-delay="300">
          <div class="left">
            <!-- Content for the left section -->
          </div>
          <div class="middle">
            <!-- Content for the middle section -->
          </div>
          <div class="right">
            <!-- Content for the right section -->
            <p>Ние проектираме и изграждаме соларни централи от всякакъв размер и тип. Вниманието към детайлите, големият опит и оборудването от висок клас ни позволяват да гарантираме ефективността на нашите фотоволтаични системи в продължение на много години.</p>
          </div>
        </div>

      <div class="row">

        <!-- ======= Services Section 1 ======= -->
        <?php
            if( $service1->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 align-items-stretch" data-aos="fade-up" data-aos-delay="500">
            <a href="/menu/service/service_1.php">
             <div class="icon-box">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4><a><?php echo $service1->service_name ?></a></h4>
                <p><?php echo $service1->service_subname ?></p>
              </div>
            </a>
          </div>
            <?php
            }?>

        <!-- ======= Services Section 2 ======= -->
        <?php
            if( $service2->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 align-items-stretch" data-aos="fade-up" data-aos-delay="700">
            <a href="/menu/service/service_2.php">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="/profile.php">
              <?php
              if (isset($_SESSION ['loged']) && ($_SESSION ['loged']) == true){
                ?><a href="/profile.php"><?php echo $service2->service_name ?></a></h4>
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
            <?php
            }?>

        <!-- ======= Services Section 3 ======= -->
        <?php
            if( $service3->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 align-items-stretch" data-aos="fade-up" data-aos-delay="900">
            <a href="/menu/service/service_3.php">
             <div class="icon-box">
                <div class="icon"><i class="bx bx-support"></i></div>
                <h4><a><?php echo $service3->service_name ?></a></h4>
                <p><?php echo $service3->service_subname ?></p>
              </div>
            </a>
          </div>
            <?php
            }?>
      </div>
      
      <div class="row">          
        <!-- ======= Services Section 4 ======= -->
        <?php
            if( $service4->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 align-items-stretch" data-aos="fade-up" data-aos-delay="500">
            <a href="/menu/service/service_4.php">
             <div class="icon-box">
                <div class="icon"><i class="bx bx-wallet"></i></div>
                <h4><a><?php echo $service4->service_name ?></a></h4>
                <p><?php echo $service4->service_subname ?></p>
              </div>
            </a>
          </div>
            <?php
            }?>

                  <!-- ======= Services Section 5 ======= -->
        <?php
            if( $service5->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 align-items-stretch" data-aos="fade-up" data-aos-delay="700">
            <a href="/menu/service/service_5.php">
             <div class="icon-box">
                <div class="icon"><i class="bx bx-tv"></i></div>
                <h4><a><?php echo $service5->service_name ?></a></h4>
                <p><?php echo $service5->service_subname ?></p>
              </div>
            </a>
          </div>
            <?php
            }?>

                  <!-- ======= Services Section 6 ======= -->
        <?php
            if( $service6->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 align-items-stretch" data-aos="fade-up" data-aos-delay="900">
            <a href="/menu/service/service_6.php">
             <div class="icon-box">
                <div class="icon"><i class="bx bx-usb"></i></div>
                <h4><a><?php echo $service6->service_name ?></a></h4>
                <p><?php echo $service6->service_subname ?></p>
              </div>
            </a>
          </div>
            <?php
            }?>
      </div>
      
    </div>
    </section>

  </main><!-- End #main -->
  <?php 
  require_once 'C:\xampp\htdocs\SunnyDays\views\footer-services-html.php'; 
  ?>
</body>