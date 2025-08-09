<?php 
if( !defined('admindp') ) exit(); 
?>
  <?php require_once 'head-html.php'; 
  $activemenu = 'projects'; // $activemenu - за активна страница
  ?>
  

  <body>
    <?php require_once 'header-html.php';?>

  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="section-header">
          <h2>Меню: Проекти</h2>
          <?php if(!empty($saveEdit)){
            echo "Промените са запазени за: " . $saveEdit;
          }
        ?>

        <table class="table">
          <thead class="headerTable">
            <tr class="tr">
              <th scope="col">№</th>
              <th scope="col">Наименование на проекта</th>
              <th scope="col">Публикувано</th>
              <th scope="col">Редакция</th>
            </tr>
          </thead>
            <tbody class="tableBody">
              <?php
              foreach($project as $k=>$edit){
                echo "<tr>";
                echo "<th scope='row'>".$edit['id']."</th>";
                echo "<td>".$edit['title']."</td>";
                  if ($edit['published'] == 1) {
                    echo "<td><span class='published-yes' title='Текстът е публикуван'>Yes <i class='fas fa-check-circle'></i></span></td>";
                  } else {
                    echo "<td><span class='published-no' title='Текстът НЕ Е публикуван'>No <i class='fas fa-times-circle'></span></td>";
                  }
                echo "<td><a class='btn-get-started' href='projects.php?id=".$edit['id']."'>Редактирай</a></td>";
              }
              ?>
            </tbody>
        </table>
      </div>
    </div>
  </section><!-- End Hero Section -->

      <?php require_once 'footer-html.php'; ?>