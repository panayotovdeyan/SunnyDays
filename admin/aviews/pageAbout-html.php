<?php 
if( !defined('admindp') ) exit(); 
?>
  <?php require_once 'head-html.php'; 
  $activemenu = 'about'; // $activemenu - за активна страница
  ?>
  

  <body>
    <?php require_once 'header-html.php';?>

  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="section-header">
          <h2>Меню: За нас</h2>
          <?php if(!empty($saveEdit)){
            echo "Промените са запазени за: " . $saveEdit;
          }
        ?>

        <table class="table">
          <thead class="headerTable">
            <tr class="tr">
              <th scope="col">№</th>
              <th scope="col">Наименование на темата</th>
              <th scope="col">Публикувано</th>
              <th scope="col">Редакция</th>
            </tr>
          </thead>
            <tbody class="tableBody">
              <?php
              foreach($pageAbout as $k=>$pageAbout){
                echo "<tr>";
                echo "<th scope='row'>".$pageAbout['id']."</th>";
                echo "<td>".$pageAbout['title']."</td>";
                echo "<td>".$pageAbout['published']."</td>";
                echo "<td><a class='btn-get-started' href='pageAbout.php?id=".$pageAbout['id']."'>Редактирай</a></td>";
              }
              ?>
            </tbody>
        </table>
      </div>
    </div>
  </section><!-- End Hero Section -->

      <?php require_once 'footer-html.php'; ?>