<?php 
if( !defined('SunnyDays') ) exit();
$activemenu = 'account'; // $activemenu - за активна страница
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body>
    <main id="main">
    <!-- ======= Section Logout ======= -->
        <section class="inner-page" id="logoutSection">
        <div class="container" data-aos="fade-up">
            <?php
            if (isset ($_SESSION['loged']) && $_SESSION['loged'] == true){ ?>
            <br>
            <h3>Наистина ли искате да излезете от сайта?</h3>
            <form method="post">
                <input type="hidden" name="logout" value="0" id="logout">
                <button class="btn btn-primary active" type="submit" onclick="document.getElementById('logout').value=1;">Изход</button>
            </form>
        </div>
            <?php
            }else{
            ?>
            <br>
            <h3>Вие не сте влезли в сайта!</h3><a href="/login.php" class="btn btn-primary active"><h4>Влез</h4></a>
            <br>
            <?php
            }
            ?>
        </section>
    </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>