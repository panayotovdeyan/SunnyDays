<?php
if( !defined('admindp') ) exit(); 
?>
  <?php require_once 'aviews/head-html.php'; 
  $activemenu = 'about'; // $activemenu - за активна страница
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

                <div class="col-md-6 form-group mt-3 mt-md-2">
                <label for="title" id="editLabel">Заглавие</label>
                  <input type="text" class="form-control" name="title" id="title" value="<?= $pageAbout->title ?>" placeholder="Въведете заглавие" required>
                </div>

              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="subtitle" id="editLabel">Подзаглавие</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?= $pageAbout->subtitle ?>" placeholder="Въведете подзаглавие" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="image" id="editLabel">Път до снимка</label>
                <br>
                <input type="file" class="form-control-file" id="imageInput" onchange="updateImagePreview(this)">
                <input type="text" class="form-control" name="image" id="image" value="<?= $pageAbout->image ?>" placeholder="Въведете път до картинката">
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
              <label for="text" id="editLabel">Въвеждане и/или Редактиране на текст</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="6" placeholder="Въведете текст"><?= stripslashes($pageAbout->text) ?></textarea>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2, publish-box">
                <label for="checkboxUnChecked" id="editLabel">Публикуване</label>
                <br><br>
                  <?php
                  $publishedYes=$pageAbout->published;
                  if( $publishedYes == 0 ){?>
                    <input type="checkbox" id="checkboxUnChecked" name="published" value="1">
                    <label for="checkboxUnChecked" id="checkboxUnChecked">Маркирай за публикуване</label>
                    <div class="text-left mt-3, checked-box">
                      <button class="btn-get-started" type="submit" value="1" onclick="getValue()">Запис/Публикуване</button>
                      <a href="pageAbout.php" class="btn-get-started">Отказ</a>
                    </div>
                    <div class="text-left mt-3, save-box">
                      <button  name="save-box" class="btn-get-started" type="submit" value="1" onclick="getValue()">Запис на промените</button>
                      <a href="pageAbout.php" class="btn-get-started">Отказ</a>
                    </div>

                    <?}else{?>
                    <input type="checkbox" checked name="published" id="checkboxChecked" value="1">
                    <label for="checkboxChecked">Публикувано </label>
                    <div class="editLabel">
                      <br>
                      <label for="checkboxChecked" id="checkboxChecked">
                        * Размаркирай за сваляне на публикацията
                      </label>
                    </div>
                    <div class="text-left mt-3, unchecked-box">
                      <button class="btn-get-started" type="submit" value="1" onclick="getValue()">Запис/сваляне</button>
                      <a href="pageAbout.php" class="btn-get-started">Отказ</a>
                    </div>
                    <div class="text-left mt-3, save-box1" >
                      <button name="save-box1" class="btn-get-started" type="submit" value="1" onclick="getValue()">Запис на промените</button>
                      <a href="pageAbout.php" class="btn-get-started">Отказ</a>
                    </div>

                  <?}
                  ?>
              </div>
              <br>



            </form>
          </div>

        </div>
     </section><!-- End Hero Section -->
    </main>
  </body>
<?php require_once 'aviews/footer-html.php'; ?>
