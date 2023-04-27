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
                  <input type="text" class="form-control" name="memberName" id="memberName" value="<?= $member->memberName ?>" placeholder="Въведете Имена" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="memberPosition" id="memberPosition" value="<?= $member->memberPosition ?>" placeholder="Въведете позиция" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="memberImage" id="memberImage" value="<?= $member->memberImage ?>" placeholder="Въведете път до снимката" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <textarea class="form-control" name="memberDescription" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $member->memberDescription ?></textarea>
              </div>
              <br>
              <div class="text-left mt-3">
                <button class="btn-get-started" type="submit" value="1">Запис</button>
                <a href="team.php" class="btn-get-started">Отказ</a>
              </div>
            </form>
        </div><!-- End Contact Form -->
    </div>
  </section><!-- End Hero Section -->

  </main><!-- End #main -->


  <?php require_once 'aviews/footer-html.php'; ?>