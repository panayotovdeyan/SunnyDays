<?php 
session_start();
define("cmsdp", true);
require_once 'views/head-html.php';

?>
<body>
    <?php require_once 'views/header-html.php'; ?>

    <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="inner-page">
        <div class="container" data-aos="fade-up">
        <h3>Въведохте грешен имейл или парола?</h3>
        <p>Моля опитайте оново или се регистрирайте!</p>
        <a button href="/login.php" type="button" class="btn btn-primary active"><h5>Вход</h5></a>
        <a button href="/reg.php" type="button" class="btn btn-primary active"><h5>Регистрация</h5></a>
        <br>

    </section>
</main><!-- End #main -->

<?php require_once 'views/footer-html.php'; ?>