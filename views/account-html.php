<?php 
// print_r($_SESSION);die; 
if( !defined('SunnyDays') ) exit();

require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\reporting.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\user.php';

require_once 'head-html.php';

?>

  <body>
    <?php require_once 'header-html.php'; ?>

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
      
    </section><!-- End account Section -->

</main><!-- End #main -->

<?php require_once 'views/footer-html.php'; ?>