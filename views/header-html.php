<?php 
if( !defined('SunnyDays') ) exit();
require_once 'C:\xampp\htdocs\sunnydays\menu\service_header.php'; //for load sub services drop-down menus

if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
  $loged = true;
}else{
  $loged = false;
}
?>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="/menu/contact.php">contact@sunnydays.com</a>
        <i class="call-icon"><img src="/assets/img/Icons/call_white_18dp.svg"></i>
          <span>
            <a href="tel://+35988123456">088 123 4567</a>
          </span>
      </div>

            <!-- Profile -->
            <div class="profile-info d-flex align-items-left">
              <?php
              if (isset ($_SESSION['user']['name'])){
                ?>
                  <img src="/assets/img/Icons/person_white_24dp.svg" class="profilIcon" >
                    <span class="profileMenuLink">
                      <span class="dd-text d-none d-md-inline">
                        <span style="text-decoration-color: #eca21a">
                          <?php
                          if(  $_SESSION['user']['admin'] == 1 ){ 
                            echo "{$_SESSION['user']['name']} {$_SESSION['user']['family']} ({$_SESSION['user']['email']})";
                            $currentPage = basename($_SERVER['PHP_SELF']); // примерно: about.php
                            $adminLink = '';

                            switch ($currentPage) {
                              case 'about.php':
                                $adminLink = '/admin/pageAbout.php?from=about';
                                break;
                              case 'service_home.php':
                                $adminLink = '/admin/services.php?from=serv';
                                break;
                              case 'projects.php':
                                $adminLink = '/admin/projects.php?from=projects';
                                break;
                              case 'offer.php':
                                $adminLink = '/admin/offers.php?from=offer';
                                break;
                              case 'team.php':
                                $adminLink = '/admin/team.php?from=team';
                                break;
                              default:
                                $adminLink = '/admin/index.php';
                            }
                            ?>
                            <a href="<?= $adminLink ?>" class="btn btn-outline-light btn-sm ms-2" title="Админ панел (текуща секция)">Админ панел</a>
                            <?php
                          }else{
                            echo "Потребител: {$_SESSION['user']['name']} {$_SESSION['user']['family']}";
                            ?>
                            <a href="/profile.php" aria-expanded="false" id="profileMenuLink" role="button" class="btn btn-outline-light btn-sm ms-2" title="Потребителски профил">Профил</a>
                            <?php
                          }
                          ?>
                        </span>
                      </span>
                    </span>
                  </a>
                <?php
              }
              ?>
            </div>
              <!--End Profile -->

      <div class="social-links d-none d-md-block">
        <a href="https://www.facebook.com/" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>
  <!-- End ======= Top Bar ======= -->
  
  <!-- Start ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

    <a href="/" class="logo"><img src="/assets/img/SD_Logo3.gif" alt="" class="img-fluid"></a>  
    <a href="/" class="logo">Sunny Days</a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/"<?php if ($activemenu == 'homepage'){ ?>class="active"<?php } ?>><img src="/assets/img/Icons/home_white_24dp.svg"></a></li>
          <li><a href="/menu/about.php"<?php if ($activemenu == 'about'){ ?>class="active"<?php } ?>>За нас</a></li>
            <li class="dropdown"><a href="/menu/service/service_home.php"<?php if ($activemenu == 'services'){ ?>class="active"<?php } ?> ><span>Услуги</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><?php if( $service1->published == 1 ){?><a href="/menu/service/service_1.php"><?php echo "$service1->service_name";?></a></li><?}?>
                <li><?php if( $service2->published == 1 ){?><a href="/menu/service/service_2.php"><?php echo "$service2->service_name";?></a></li><?}?>
                <li><?php if( $service3->published == 1 ){?><a href="/menu/service/service_3.php"><?php echo "$service3->service_name";?></a></li><?}?>
                <li><?php if( $service4->published == 1 ){?><a href="/menu/service/service_4.php"><?php echo "$service4->service_name";?></a></li><?}?>
                <li><?php if( $service5->published == 1 ){?><a href="/menu/service/service_5.php"><?php echo "$service5->service_name";?></a></li><?}?>
                <li><?php if( $service6->published == 1 ){?><a href="/menu/service/service_6.php"><?php echo "$service6->service_name";?></a></li><?}?>
              </ul>
          <li><a href="/menu/projects.php"<?php if ($activemenu == 'projects'){ ?>class="active"<?php } ?>>Проекти</a></li>
          <li><a href="/menu/offer.php"<?php if ($activemenu == 'offer'){ ?>class="active"<?php } ?>>Поискай оферта</a></li>
          <li><a href="/menu/team.php"<?php if ($activemenu == 'team'){ ?>class="active"<?php } ?>><img src="/assets/img/Icons/team_white_24dp.svg" class="icon1">Екип</a></li>

          <a href="/menu/contact.php"<?php if ($activemenu == 'contact'){ ?>class="active"<?php } ?>>Контакти</a>
          <?php
            if( !$loged ){?>
              <li class="dropdown"><a <?php if ($activemenu == 'account'){ ?>class="active"<?php } ?> ><img src="/assets/img/Icons/person_white_24dp.svg"> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="/login.php" <?php if ($activemenu == 'login'){ ?>class="hidden"<?php } ?>>Вход<img src="/assets/img/Icons/login_white_24dp.svg" class="icon1"></a></li>
                  <li><a href="/reg.php" <?php if ($activemenu == 'reg'){ ?>class="hidden" <?php } ?>>Регистрация<img src="/assets/img/Icons/how_to_reg_24dp_FFFFFF.svg" class="icon1"></a></li>
                </ul>
              </li>
            <?}else{?>
              <a href="/logout.php" <?php if ($activemenu == 'logout'){ ?>class="active"<?php } ?>>Изход<img src="/assets/img/Icons/logout_white_24dp.svg" class="icon2"></a>
            <?}?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->