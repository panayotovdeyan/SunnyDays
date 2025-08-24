<?php 
if( !defined('SunnyDays') ) exit();
$activemenu = 'account'; // $activemenu - за активна страница
require_once __DIR__ . '/../config.php';
require_once PROJECT_ROOT . '/views/head-html.php';
require_once PROJECT_ROOT . '/views/header-html.php';
?>
<body>
 <main id="main">
    <!-- ======= Account Section ======= -->
    <section id="account" class="account">
      <div class="container">      
        <div class="member">
          <h4><?php echo "Здравейте, {$_SESSION['user']['name']} {$_SESSION['user']['family']} <br>"; ?></h4>
          <h4><?php echo "Вашите данни:"; ?></h4>
          <p><?php echo"<p> Email: {$_SESSION['user']['email']} </p>"; ?></h4>
          <p><?php echo"<p> Имена: {$_SESSION['user']['name']} {$_SESSION['user']['family']}</p>"; ?></h4>
          <p><?php echo"<p> Град: {$_SESSION['user']['city']} </p>"; ?></h4>
          <p><?php echo"<p> Регистриран на: {$_SESSION['user']['regDate']} </p>";?></h4>
        </div>
      </div>
    </section><!-- End account Section -->
  </main><!-- End #main -->
  <?php 
  require_once PROJECT_ROOT . '/views/footer-html.php'; 
  ?>
</body>