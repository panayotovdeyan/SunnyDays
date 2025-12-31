<?php 
if( !defined('SunnyDays') ) exit(); 
$activemenu = 'team'; // $activemenu - за активна страница
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body class = "team-body">
  <main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <span>Екип</span>
          <h2>Екип</h2>
        </div>
        <div class="row" data-aos="fade-up">
            <?php
            if( $member7->published == 1 ){?>
            <div class="info-box mb-4">
              <?php echo stripslashes($member7->memberDescription) ?>
            </div>
            <?}?>
        </div>        

        <div class="row">
        <?php
          if( $member1->published == 1 ){?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
          <div class="member" title="<?php echo $member1->memberName ?>">
            <?php echo "<img src='" . $member1->memberImage . "'>"; ?>
              <h4><?php echo $member1->memberName ?></h4>
              <span><?php echo $member1->memberPosition ?></span>
              <div><?php echo stripslashes($member1->memberDescription) ?></div>
              <div class="social">
                <a href="tel://+35988123456"><i class="bi bi-phone"></i></a>
                <a href="/menu/contact.php"><i class="bi bi-envelope"></i></a>
                <a href="https://www.linkedin.com"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <?}?>

          <?php
          if( $member2->published == 1 ){?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
          <div class="member" title="<?php echo $member2->memberName ?>">
            <?php echo "<img src='" . $member2->memberImage . "'>"; ?>
              <h4><?php echo $member2->memberName ?></h4>
              <span><?php echo $member2->memberPosition ?></span>
              <div><?php echo stripslashes($member2->memberDescription) ?></div>
              <div class="social">
              <a href="tel://+35988123456"><i class="bi bi-phone"></i></a>
                <a href="/menu/contact.php"><i class="bi bi-envelope"></i></a>
                <a href="https://www.linkedin.com"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <?}?>

          <?php
          if( $member3->published == 1 ){?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member" title="<?php echo $member3->memberName ?>">
            <?php echo "<img src='" . $member3->memberImage . "'>"; ?>
              <h4><?php echo $member3->memberName ?></h4>
              <span><?php echo $member3->memberPosition ?></span>
              <div><?php echo stripslashes($member3->memberDescription) ?></div>
              <div class="social">
              <a href="tel://+35988123456"><i class="bi bi-phone"></i></a>
                <a href="/menu/contact.php"><i class="bi bi-envelope"></i></a>
                <a href="https://www.linkedin.com"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <?}?>
        </div>

        <?php
          if( $member4->published == 1 ){?>
        <div class="row">
          <div class="col-lg-4 col-md-6 mt-md-2 d-flex align-items-stretch" data-aos="zoom-in">
          <div class="member" title="<?php echo $member4->memberName ?>">
            <?php echo "<img src='" . $member4->memberImage . "'>"; ?>
              <h4><?php echo $member4->memberName ?></h4>
              <span><?php echo $member4->memberPosition ?></span>
              <div><?php echo stripslashes($member4->memberDescription) ?></div>
              <div class="social">
              <a href="tel://+35988123456"><i class="bi bi-phone"></i></a>
                <a href="/menu/contact.php"><i class="bi bi-envelope"></i></a>
                <a href="https://www.linkedin.com"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <?}?>

          <?php
          if( $member5->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 d-flex align-items-stretch" data-aos="zoom-in">
          <div class="member" title="<?php echo $member5->memberName ?>">
            <?php echo "<img src='" . $member5->memberImage . "'>"; ?>
              <h4><?php echo $member5->memberName ?></h4>
              <span><?php echo $member5->memberPosition ?></span>
              <div><?php echo stripslashes($member5->memberDescription) ?></div>
              <div class="social">
                <a href="tel://+35988123456"><i class="bi bi-phone"></i></a>
                <a href="/menu/contact.php"><i class="bi bi-envelope"></i></a>
                <a href="https://www.linkedin.com"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <?}?>

          <?php
          if( $member6->published == 1 ){?>
          <div class="col-lg-4 col-md-6 mt-md-2 d-flex align-items-stretch" data-aos="zoom-in">
          <div class="member" title="<?php echo $member6->memberName ?>">
            <?php echo "<img src='" . $member6->memberImage . "'>"; ?>
              <h4><?php echo $member6->memberName ?></h4>
              <span><?php echo $member6->memberPosition ?></span>
              <div><?php echo stripslashes($member6->memberDescription) ?></div>
              <div class="social">
                <a href="tel://+35988123456"><i class="bi bi-phone"></i></a>
                <a href="/menu/contact.php"><i class="bi bi-envelope"></i></a>
                <a href="https://www.linkedin.com"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <?}?>
        </div>
      </div>
    </section><!-- End Team Section -->
  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>