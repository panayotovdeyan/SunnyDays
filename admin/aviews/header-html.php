<?php 
if( !defined('admindp') ) exit(); 
?>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">


            <!-- Profile -->
            <?php
            if (isset ($_SESSION['user']['name'])){

            }
            ?>
              <?php
              if (isset($_GET['from'])) {
                $activemenu = $_GET['from'];
              }
              ?>

        <div class="contact-info d-flex align-items-left">

            <!--End Profile -->

  </section>
  <!-- End ======= Top Bar ======= -->
  
  <!-- Start ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo">Администратор: <?php echo "<br>{$_SESSION['user']['name']} {$_SESSION['user']['family']}"?></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="pageAbout.php"<?php if ($activemenu == 'about'){ ?>class="active"<?php } ?>>Меню: За нас</a></li>
          <li><a href="services.php"<?php if ($activemenu == 'serv'){ ?>class="active"<?php } ?> ><span>Меню: Услуги</span></a></li>
          <li><a href="projects.php"<?php if ($activemenu == 'projects'){ ?>class="active"<?php } ?>>Меню: Проекти</a></li>
          <li><a href="offers.php"<?php if ($activemenu == 'offer'){ ?>class="active"<?php } ?>>Меню: Поискай ферта</a></li>
          <li><a href="team.php"<?php if ($activemenu == 'team'){ ?>class="active"<?php } ?>>Меню: Екип</a></li>
          <li><a <?php if ($activemenu == 'about'){?>href="/menu/about.php" <?}?>
                 <?php if ($activemenu == 'serv'){?>href="/menu/service/service_home.php" <?}?>
                 <?php if ($activemenu == 'projects'){?>href="/menu/projects.php" <?}?>
                 <?php if ($activemenu == 'offer'){?>href="/menu/offer.php" <?}?>
                 <?php if ($activemenu == 'team'){?>href="/menu/team.php" <?}?>
                 <?php if ($activemenu == 'homepage'){?>href="/" <?}?>
                >Връщане към сайта</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->