<?php 
if( !defined('cmsdp') ) exit(); 
?>
  <?php require_once 'head-html.php'; 
  $activemenu = 'projects'; // $activemenu - за активна страница
  ?>
  

  <body class = "projects-body">
  
    <?php require_once 'header-html.php'; ?>

  <main id="main">

<!-- ======= Menu Projects ======= -->
    <section id="projects" class="inner-page" data-aos="fade-up">
      <div class="container">

          <!-- ======= Menu Project 1 ======= -->
        <section id="projects" class="inner-page">
        <div class="container">
              <h2><?php echo $project1->title ?></h2>
              <h4><?php echo $project1->subtitle ?></h4>
              <p><?php echo $project1->text ?></p>
              <?php echo "<img id='img' src='" . $project1->image . "'>"; ?>
            </div>
          </section>

          <!-- ======= End Menu Project 1 ======= -->

          <!-- ======= Menu Project 2 ======= -->
          <section id="projects" class="inner-page">
            <div class="container">
              <h2><?php echo $project2->title ?></h2>
              <h4><?php echo $project2->subtitle ?></h4>
              <p><?php echo $project2->text ?></p>
              <?php echo "<img src='" . $project2->image . "'>"; ?>
            </div>
          </section>

          <!-- ======= End Menu Project 2 ======= -->

      </div>
    </section>
  </main><!-- End #main -->
  </body>

<?php require_once 'footer-html.php'; ?>