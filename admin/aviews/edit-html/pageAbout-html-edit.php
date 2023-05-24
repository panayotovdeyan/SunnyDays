<?php
if( !defined('admindp') ) exit(); 
?>
  <?php require_once 'aviews/head-html.php'; 
  $activemenu = 'pageAbout'; // $activemenu - за активна страница
  ?>
  

  <body>
    <?php require_once 'aviews/header-html.php'; ?>

  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="section-header">
          <a id="editLabel"><h2>Редакция на Меню: За нас</a></h2>
        </div>
        <div class="col-lg-12">
            <form action="/admin/pageAbout.php" method="post" role="form" >
            <input type="hidden" name="id" value="<?= $pageAbout->id ?>" >
            <input type="hidden" name="submited" value="1" >
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-2">
                <label for="title" id="editLabel">Въведете заглавие</label>
                  <input type="text" class="form-control" name="title" id="title" value="<?= $pageAbout->title ?>" placeholder="Въведете заглавие" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="subtitle" id="editLabel">Въведете подзаглавие</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?= $pageAbout->subtitle ?>" placeholder="Въведете подзаглавие" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="image" id="editLabel">Въведете път до изображението</label>
                <input type="text" class="form-control" name="image" id="image" value="<?= $pageAbout->image ?>" placeholder="Въведете път до изображението" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="text" id="editLabel">Редакция/Въвеждане на текст</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $pageAbout->text ?></textarea>
              </div>
              <br>
              <label for="published" id="editLabel">Публикуване</label>
              <br><br>
              <?php
              $publishedYes=$pageAbout->published;
                  if( $publishedYes == 0 ){?>
                    Маркирай за публикуване на Темата и редакциите: <input type="checkbox" name="published" value="1">
                    <div class="editLabel"><br><p>* Моля, отбележете за да Публикувате Темата. Ако не маркирате, Темата се сваля от Публикация</p></div>
                  <?}else{?>
                    Свали публикацията / Публикувай на по-късен етап: <input type="checkbox" name="published" value="0">
                    <div class="editLabel"><br><p>* Моля, маркирайте за да свалите Публикацията</p></div>
                  <?}
              ?>
              <br>
              <div class="text-left mt-3">
                <button class="btn-get-started" type="submit" value="1" onclick="getValue()">Запис</button>
                <a href="pageAbout.php" class="btn-get-started">Отказ</a>
              </div>
            </form>
        </div><!-- End Contact Form -->

    </div>
  </section><!-- End Hero Section -->


  </main><!-- End #main -->


  <?php require_once 'aviews/footer-html.php'; ?>