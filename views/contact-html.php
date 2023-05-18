<?php 
if( !defined('SunnyDays') ) exit(); 
?>

<?php
require_once 'head-html.php';
$activemenu = 'contact'; // $activemenu - за активна страница
?>
<body>
    <?php require_once 'header-html.php'; ?>

    <main id="main">


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Контакти</span>
          <h2>Контакти</h2>
          <p>Преди посещение при нас, моля, уговорете среща по телефона.</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Адрес</h3>
              <p>гр. София, бул. Цариградско шосе, 145, п.к. 1784</p>
              <p>в сградата на SOFIA OFFICE CENTER</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Пишете ни</h3>
              <p>contact@sunnydays.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Обадете се</h3>
              <p>088 123 4567</p>
            </div>  
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-6 ">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10457.497942779575!2d23.389932410204718!3d42.649991869173675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40aa87ce37ebe033%3A0xaf56e1bc0f2aa0a5!2sSOFIA%20OFFICE%20CENTER!5e0!3m2!1sen!2sbg!4v1682284866941!5m2!1sen!2sbg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6">
            <form action="/mailContact.php" method="post" role="form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Вашето Име" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Вашият имейл" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Как можем да Ви помогнем?" required></textarea>
              </div>
              <div class="my-3"></div>
              <div class="text-center">
                <button class="btn btn-primary active" type="submit" name="send" value = "send">Изпрати</button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    </main><!-- End #main -->

<?php require_once 'footer-html.php'; ?>