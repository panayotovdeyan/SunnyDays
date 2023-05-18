<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\service.php';
$service1 = new Service(1);
$service2 = new Service(2);
$service3 = new Service(3);

require_once 'C:\xampp\htdocs\SunnyDays\views\service\service_home-html.php';