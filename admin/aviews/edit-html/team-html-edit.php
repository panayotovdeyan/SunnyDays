<?php 
if( !defined('admindp') ) exit();
?>
  <?php require_once 'aviews/head-html.php'; 
  $activemenu = 'team'; // $activemenu - за активна страница
  ?>
  

  <body>
    <?php require_once 'aviews/header-html.php'; ?>

  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="section-header">
          <h2>Редакция на Меню: Екип</h2>
        </div>
        <div class="col-lg-12">
            <form action="" method="post" role="form" >
            <input type="hidden" name="id" value="<?= $member->id ?>" >
            <input type="hidden" name="submited" value="5" >
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-2">
                <label for="title" id="editLabel">Въвеждане/Редактиране - Имена на служителя</label>
                  <input type="text" class="form-control" name="memberName" id="memberName" value="<?= $member->memberName ?>" placeholder="Въведете Имена" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="title" id="editLabel">Въвеждане/Редактиране - Позиция на служителя</label>
                <input type="text" class="form-control" name="memberPosition" id="memberPosition" value="<?= $member->memberPosition ?>" placeholder="Въведете позиция" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="title" id="editLabel">Въвеждане/Редактиране - Снимка на служителя</label>
                <input type="text" class="form-control" name="memberImage" id="memberImage" value="<?= $member->memberImage ?>" placeholder="Въведете път до снимката" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="title" id="editLabel">Въвеждане/Редактиране - Описание за длъжността</label>
                <textarea class="form-control" name="memberDescription" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $member->memberDescription ?></textarea>
              </div>
              <br>
              <label for="published" id="editLabel">Публикуване</label>
              <br><br>
              <?php
              $publishedYes=$member->published;
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
                <a href="team.php" class="btn-get-started">Отказ</a>
              </div>
            </form>
        </div><!-- End Contact Form -->
    </div>
  </section><!-- End Hero Section -->

  </main><!-- End #main -->


  <?php require_once 'aviews/footer-html.php'; ?>