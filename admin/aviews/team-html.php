<?php 
if( !defined('admindp') ) exit();
?>
  <?php require_once 'head-html.php'; 
  $activemenu = 'team'; // $activemenu - за активна страница
  ?>
  

  <body>
    <?php require_once 'header-html.php';?>

  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="section-header">
          <h1>Меню: Екип</h1>
          <?php if(!empty($saveEdit)){
            echo "Промените са запазени за: " . $saveEdit;
          }
        ?>
        <br>
<h2>Презентация на екипа като цяло</h2>
<table class="table mb-5">
  <thead class="headerTable">
    <tr>
      <th scope="col">№</th>
      <th scope="col">Текст-представяне (откъс)</th>         
      <th scope="col">Публикувано</th>
      <th scope="col">Редакция</th>
    </tr>
  </thead>
  <tbody class="tableBody">
    <?php
    foreach($allMembers as $m) {
        if($m['id'] == 7) { // Показваме само записа за презентация
            echo "<tr>";
            echo "<td>" . $m['id'] . "</td>";
            echo "<td>" . mb_strimwidth(strip_tags(stripslashes($m['memberDescription'])), 0, 100, "...") . "</td>";
                  if ($m['published'] == 1) {
                    echo "<td><span class='published-yes' title='Текстът е публикуван'>Yes <i class='fas fa-check-circle'></i></span></td>";
                  } else {
                    echo "<td><span class='published-no' title='Текстът НЕ Е публикуван'>No <i class='fas fa-times-circle'></span></td>";
                  }
            echo "<td><a class='btn btn-warning btn-sm' href='team.php?id=" . $m['id'] . "'>Редактирай текст</a></td>";
            echo "</tr>";
        }
    }
    ?>
  </tbody>
</table>

<h2>Индивидуални членове на екипа</h2>
<table class="table">
  <thead class="headerTable">
    <tr>
      <th scope="col">№</th>
      <th scope="col">Снимка</th>
      <th scope="col">Имена</th>
      <th scope="col">Позиция</th>
      <th scope="col">Публикувано</th>
      <th scope="col">Редакция</th>
    </tr>
  </thead>
  <tbody class="tableBody">
    <?php
    foreach($allMembers as $m) {
        if($m['id'] != 7) { // Скриваме презентацията от този списък
            echo "<tr>";
            echo "<td>" . $m['id'] . "</td>";
            echo "<td><img src='" . $m['memberImage'] . "' width='40'></td>";
            echo "<td>" . $m['memberName'] . "</td>";
            echo "<td>" . $m['memberPosition'] . "</td>";
                  if ($m['published'] == 1) {
                    echo "<td><span class='published-yes' title='Текстът е публикуван'>Yes <i class='fas fa-check-circle'></i></span></td>";
                  } else {
                    echo "<td><span class='published-no' title='Текстът НЕ Е публикуван'>No <i class='fas fa-times-circle'></span></td>";
                  }
            echo "<td><a class='btn btn-primary btn-sm' href='team.php?id=" . $m['id'] . "'>Редактирай член</a></td>";
            echo "</tr>";
        }
    }
    ?>
  </tbody>
</table>
      </div>
    </div>
  </section><!-- End Hero Section -->

      <?php require_once 'footer-html.php'; ?>