<?php 
if( !defined('cmsdp') ) exit();
require_once 'head-html.php';
$activemenu = 'logout'; // $activemenu - за активна страница
?>
<body>
    <?php require_once 'header-html.php'; ?>

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

<?php require_once 'footer-html.php'; ?>