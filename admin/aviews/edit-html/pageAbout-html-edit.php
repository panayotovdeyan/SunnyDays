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
      <a id="editLabel"><h2>Редакция на Меню: За нас</h2></a>
    </div>
        <div class="col-lg-12">
            <form action="/admin/pageAbout.php" method="post" role="form" >
            <input type="hidden" name="id" value="<?= $pageAbout->id ?>" >
            <input type="hidden" name="submited" value="1" >
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-2">
                <label for="title" id="editLabel">Въвеждане/Редактиране на заглавие</label>
                  <input type="text" class="form-control" name="title" id="title" value="<?= $pageAbout->title ?>" placeholder="Въведете заглавие" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="subtitle" id="editLabel">Въвеждане/Редактиране на подзаглавие</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?= $pageAbout->subtitle ?>" placeholder="Въведете подзаглавие" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="image" id="editLabel">Въвеждане/Редактиране на път до изображението</label>
                <input type="text" class="form-control" name="image" id="image" value="<?= $pageAbout->image ?>" placeholder="Въведете път до изображението" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="text" id="editLabel">Въвеждане/Редактиране на текст</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $pageAbout->text ?></textarea>
              </div>
              <br>
              <label for="published" id="editLabel">Публикуване</label>
              <br><br>
              <?php
              $publishedYes=$pageAbout->published;
              if( $publishedYes == 0 ){?>
                Маркирай за публикуване: <input type="checkbox" id="checkboxUnChecked" name="published" value="1">
                <div class="editLabel"><br><p>* Моля, отбележете за да Публикувате.</p></div>
              <?}else{?>
                Публикувано: <input type="checkbox" checked id="checkboxChecked" name="published" value="1">
                <div class="editLabel"><br><p>* Размаркирайте за сваляне на публикацията</p></div>
              <?}
              ?>
              <br>
              <div class="text-left mt-3">
              <button class="btn-get-started" type="submit" value="1" onclick="getValue()">Запис</button>
                <a href="pageAbout.php" class="btn-get-started">Отказ</a>
              </div>
            </form>
        </div>

    </div>
  </section><!-- End Hero Section -->

  </main>


  <?php require_once 'aviews/footer-html.php'; ?>