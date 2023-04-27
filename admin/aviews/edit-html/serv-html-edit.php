<?php 
if( !defined('admindp') ) exit();
?>
  <?php require_once 'aviews/head-html.php'; 
  $activemenu = 'serv'; // $activemenu - за активна страница
  ?>
  

  <body>
    <?php require_once 'aviews/header-html.php'; ?>

  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="section-header">
          <h2>Редакция на Меню: Услуги</h2>
        </div>
        <div class="col-lg-12">
            <form action="" method="post" role="form" >
            <input type="hidden" name="id" value="<?= $serv->id ?>" >
            <input type="hidden" name="submited" value="2" >
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-2">
                  <input type="text" class="form-control" name="service_name" id="service_name" value="<?= $serv->service_name ?>" placeholder="Въведете заглавие" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="service_subname" id="service_subname" value="<?= $serv->service_subname ?>" placeholder="Въведете подзаглавие" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="service_image" id="service_image" value="<?= $serv->service_image ?>" placeholder="Въведете път до изображението" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <textarea class="form-control" name="service_description" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $serv->service_description ?></textarea>
              </div>
              <br>
              <div class="text-left mt-3">
                <button class="btn-get-started" type="submit" value="1">Запис</button>
                <a href="services.php" class="btn-get-started">Отказ</a>
              </div>
            </form>
        </div><!-- End Contact Form -->
    </div>
  </section><!-- End Hero Section -->

  </main><!-- End #main -->


  <?php require_once 'aviews/footer-html.php'; ?>