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
            <?php if($member->id != 7): // Полетата се виждат само за служители ?>
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            <label>Имена на служителя</label>
                            <input type="text" class="form-control" name="memberName" value="<?= $member->memberName ?>" required>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <label>Позиция</label>
                            <input type="text" class="form-control" name="memberPosition" value="<?= $member->memberPosition ?>">
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <label>Път до снимка</label>
                            <input type="text" class="form-control" name="memberImage" value="<?= $member->memberImage ?>">
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="memberName" value="Презентация">
                    <div class="alert alert-info">Редактирате общия презентационен текст за целия екип.</div>
                <?php endif; ?>

                <div class="form-group mt-3">
                    <label><?= ($member->id == 7) ? "Текст на презентацията" : "Описание на отговорностите" ?></label>
                    <textarea class="form-control" name="memberDescription" id="exampleFormControlTextarea1" rows="10"><?= stripslashes($member->memberDescription) ?></textarea>
                </div>

                <div class="mt-4">
                    <label>
                        <input type="checkbox" name="published" value="1" <?= $member->published == 1 ? 'checked' : '' ?>> 
                        Публикувано на сайта
                    </label>
                </div>

                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Запис на промените</button>
                    <a href="team.php" class="btn btn-secondary">Отказ</a>
                </div>
            </form>
        </div><!-- End Contact Form -->
    </div>
  </section><!-- End Hero Section -->

  </main><!-- End #main -->


  <?php require_once 'aviews/footer-html.php'; ?>