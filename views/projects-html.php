<?php 
if( !defined('SunnyDays') ) exit(); 
$activemenu = 'projects'; // $activemenu - за активна страница
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body>
  <main class="projects-body" id="main">
    <!-- ======= Menu Projects ======= -->
    <section id="projects" class="inner-page" data-aos="fade-up">
      <div class="container">

          <!-- ======= Menu Project 1 ======= -->
          <?php
            if( $project1->published == 1 ){?>
              <section id="projects" class="inner-page">
                <div class="container">
                  <h2><?php echo $project1->title ?></h2>
                  <h3><?php echo $project1->subtitle ?></h3>
                  <p><?php echo stripslashes($project1->text) ?></p>
                  <center><?php echo "<img src='" . $project1->image . "'>"; ?></center>
                </div>
              </section>
              <?}?>
          <!-- ======= End Menu Project 1 ======= -->

          <!-- ======= Menu Project 2 ======= -->
          <?php
            if( $project2->published == 1 ){?>
          <section id="projects" class="inner-page">
            <div class="container">
              <h2><?php echo $project2->title ?></h2>
              <h4><?php echo $project2->subtitle ?></h4>
              <p><?php echo stripslashes($project2->text) ?></p>
              <center><?php echo "<img src='" . $project2->image . "'>"; ?></center>
            </div>
          </section>
          <?}?>
          <!-- ======= End Menu Project 2 ======= -->

      </div>
    </section>
  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>