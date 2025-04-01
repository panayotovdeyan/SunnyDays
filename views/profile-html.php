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

      <!-- ======= Profile Section ======= -->
      <section id="profile" class="profile">
      <div class="container">
        
        <div class="member">
          <h4><?php echo "Здравейте, {$_SESSION['user']['name']} {$_SESSION['user']['family']} <br>"; ?></h4>
          <h4><?php echo "Вашите данни:"; ?></h4>
          <p><?php echo"<p> Email: {$_SESSION['user']['email']} </p>"; ?></h4>
          <p><?php echo"<p> Имена: {$_SESSION['user']['name']} {$_SESSION['user']['family']}</p>"; ?></h4>
          <p><?php echo"<p> Град: {$_SESSION['user']['city']} </p>"; ?></h4>
          <p><?php echo"<p> Регистриран на: {$_SESSION['user']['regDate']} </p>";?></h4>
          
        </div>
      
        <div class="section-title">
          <span>МОНИТОРИНГ</span>
          <h2>Наблюдение на вашата система</h2>
        </div>

      <div class = row>

        <div class="col-lg-6 col-md-8 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="box featured">
              <h3>Диаграма на потока в реално време</h3>
                <div class="col-lg-1 col-md-1 mt-2 mt-md-0">
                  <h3><sup>kW</sup></h3>
                </div>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                  <body>
                  <canvas id="myChart1" style="width:100%;max-width:800px"></canvas>

                <script>
                  const xValuesTime = ["0:00ч.","3:00ч.","6:00ч.","9:00ч.","12:00ч.","15:00ч.","18:00ч.","21:00ч.","23:59ч."];

                  new Chart("myChart1", {
                    type: "line",
                    data: {
                      labels: xValuesTime,
                      datasets: [{ 
                        data: [860,1140,3500,4500,4600],
                        borderColor: "red",
                        fill: false
                      }, { 
                        data: [0,0,400,2000,4000],
                        borderColor: "green",
                        fill: false
                      }]
                    },
                    options: {
                      legend: {display: false}
                    }
                  });
                </script>
            </div>
          </div>
 
          <div class="col-lg-2 col-md-4" data-aos="zoom-in" data-aos-delay="500">
            <div class="box1">
              <h3>Произведена мощност</h3>
              <h4>kw</h4>
              <p>kW средно дневно<br>kW средно месечно</p>
              <ul>
                <li>Тук ще се показва</li>
                <li>кратка информация</li>
                <li>за произведенато</li>
              </ul>
              <div class="btn-wrap">
                <a class="btn-buy" href="#tableHistoricalData">Подробни данни</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4" data-aos="zoom-in" data-aos-delay="700">
            <div class="box2">
              <h3>Консумирана мощност</h3>
              <h4>kw</h4>
              <p>kW средно дневно<br>kW средно месечно</p>
              <ul>
                <li>Тук ще се показва</li>
                <li>кратка информация</li>
                <li>за консумираното</li>
              </ul>
              <div class="btn-wrap">
                <a class="btn-buy" href="#tableHistoricalData">Подробни данни</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4" data-aos="zoom-in" data-aos-delay="900">
            <div class="box">
              <h3>Исторически данни</h3>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                <body>

                <canvas id="myChart2" style="width:100%;max-width:800px"></canvas>

                <script>
                var xValuesTTL = ["Произведено", "Консумирано"];
                var yValues = [34, 56, 70, 10];
                var barColors = ["green", "red"];

                new Chart("myChart2", {
                  type: "bar",
                  data: {
                    labels: xValuesTTL,
                    datasets: [{
                      backgroundColor: barColors,
                      data: yValues
                    }]
                  },
                  options: {
                    legend: {display: false},
                    title: {
                      display: true,
                      text: ""
                    }
                  }
                });
                </script>
                </body>
              <div class="btn-wrap">
              <a class="btn-buy" href="#tableHistoricalData">Подробни данни</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End profile Section -->

    <!-- ======= Profile1 Section ======= -->
    <section id="profile1" class="profile1">
      <div class="container">
        <div id="tableHistoricalData" class="section-title">
          <h2>Месечни данни с натрупване</h2>
        </div>

        <table class="table">
          <thead>
          <h4><center>Исторически данни за произведенато и консумираното</center></h4>
            <tr>
              <th scope="col">Отчет №</th>
              <th scope="col">Дата</th>
              <th scope="col">Произведена мощност</th>
              <th scope="col">Мерна единица</th>
              <th scope="col">Консумирана мощност</th>
              <th scope="col">Мерна единица</th>
              <th scope="col">Всичко произведена мощност</th>
              <th scope="col">Мерна единица</th>
              <th scope="col">Всичко консумирана мощност</th>
              <th scope="col">Мерна единица</th>
            </tr>
          </thead>
            <tbody>
              <?php
              foreach($reports as $r=>$report){
                echo "<tr>";
                echo "<th>".$report['reportId']."</th>";
                echo "<td>".$report['Date']."</td>";
                echo "<td>".$report['month_production']."</td>";
                echo "<td>".$report['UoMMP']."</td>";
                echo "<td>".$report['TTLproduction']."</td>";
                echo "<td>".$report['UoMTP']."</td>";
                echo "<td>".$report['month_consumption']."</td>";
                echo "<td>".$report['UoMMC']."</td>";
                echo "<td>".$report['TTLconsumption']."</td>";
                echo "<td>".$report['UoMTC']."</td>";

              }
              ?>
            </tbody>
        </table>
      </div>
    </div>
  </section><!-- End Hero Section -->

</main><!-- End #main -->

<?php require_once 'views/footer-html.php'; ?>