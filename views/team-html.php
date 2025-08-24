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
        <p>Всеки един от екипа на SUNNY DAYS е човек, натрупал опит и успехи в дадена сфера самостоятелно. Обединявайки най-силните ни страни, като страхотното обслужване на клиенти, дълбоки инженерни познания и стратегическо развитие и комуникация, можем да предложим цялостни решения. Тласка ни напред стремежът да подпомогнем тази част от обществото в България, която иска да постигне енергийна независимост за своя дом или бизнес, алтернативни методи за отопление, еко-живот и футуристичен поглед над бъдещето. Вярваме, че своевременната инвестиция в тези сфери може да гарантира едно качествено бъдеще за нашите клиенти и за това инвестираме редовно в създаването на образователни статии и видеа, с които да подпомогнем максимално този слой от обществото. Винаги сме на разположение да Ви съдействаме и да бъдем предизвикани!</p>
        

        <div class="row">
        <?php
          if( $member1->published == 1 ){?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
          <div class="member" title="<?php echo $member1->memberName ?>">
            <?php echo "<img src='" . $member1->memberImage . "'>"; ?>
              <h4><?php echo $member1->memberName ?></h4>
              <span><?php echo $member1->memberPosition ?></span>
              <p><?php echo $member1->memberDescription ?></p>
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
              <p><?php echo $member2->memberDescription ?></p>
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
              <p><?php echo $member3->memberDescription ?></p>
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
              <p><?php echo $member4->memberDescription ?></p>
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
              <p><?php echo $member5->memberDescription ?></p>
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
              <p><?php echo $member6->memberDescription ?></p>
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