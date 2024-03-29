<?php
if( !defined('admindp') ) exit(); 
?>
  <?php require_once 'aviews/head-html.php'; 
  $activemenu = 'offer'; // $activemenu - за активна страница
  ?>
  

  <body>
    <?php require_once 'aviews/header-html.php'; ?>

  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="200">

    <div class="section-header">
          <h2>Редакция на Меню: Поискай оферта</h2>
        </div>
        <div class="col-lg-12">
            <form action="" method="post" role="form" >
            <input type="hidden" name="id" value="<?= $offer->id ?>" >
            <input type="hidden" name="submited" value="4" >
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-2">
                <label for="title" id="editLabel">Въвеждане/Редактиране на заглавие</label>
                  <input type="text" class="form-control" name="title" id="title" value="<?= $offer->title ?>" placeholder="Въведете заглавие" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="subtitle" id="editLabel">Въвеждане/Редактиране на подзаглавие</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?= $offer->subtitle ?>" placeholder="Въведете подзаглавие" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="image" id="editLabel">Въвеждане/Редактиране на път до изображението</label>
                <input type="text" class="form-control" name="image" id="image" value="<?= $offer->image ?>" placeholder="Въведете път до картинката" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="text" id="editLabel">Въвеждане/Редактиране на текст</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $offer->text ?></textarea>
              </div>
              <br>
              <div class="text-left mt-3">
                <button class="btn-get-started" type="submit" value="1">Запис</button>
                <a href="offers.php" class="btn-get-started">Отказ</a>
              </div>
            </form>
        </div><!-- End Contact Form -->

    </div>
  </section><!-- End Hero Section -->

  </main><!-- End #main -->


  <?php require_once 'aviews/footer-html.php'; ?>