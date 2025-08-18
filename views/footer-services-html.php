<?php if( !defined('SunnyDays') ) exit(); ?>
<?php include_once '/subscribed.php';?>

<body class = "footer-body">
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3><a href="/">SUNNY DAYS</a></h3>
              <p>
                бул. Цариградско шосе, 145 <br>
                1748, София, България<br><br>
                <strong>Phone:</strong><a href="/menu/contact.php"> 088 123 4567</a><br>
                <strong>Email:</strong><a href="/menu/contact.php"> info@sunnydays.com</a><br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Нашите услуги</h4>
            <ul>
              <button class="btn btn-link" id="onlineMonitoring">Онлайн мониторинг</button>
              <p style="text-align: center; color: grey"><em> (само за регистрирани потребители)</em></p>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Месечен бюлетин</h4>
            <p>Ако не сте регистриран потребител, тук може да се абонирате се за нашия бюлетин, с който ще сте винаги в крак с новостите в света на фотоволтаиците<br>
            <br>
          Моля, въведете вашият email
          </p>

            <div class="imput-wrapper emailNewsletter e-hidden">
              <form method="post" action="/subscribed.php">
              <input type="email" name="email" class="form-control">
              <input type="submit" value="Subscribe">
              </form>
          </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        2021 - 2025 &copy; Copyright <strong><span>SUNNY DAYS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
        Designed by <a href="https://github.com/panayotovdeyan?tab=projects">Deyan Panayotov</a>
      </div>
    </div>
  </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- <div id="preloader"></div> не работи на страниците с услуги-->

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Custom JS Files -->
  <script src="../assets/js/form-validation.js"></script>
  <script src="../assets/js/jsSunnyDays.js"></script>
  <!-- <script src="../assets/js/moment.js"></script> -->

</body>