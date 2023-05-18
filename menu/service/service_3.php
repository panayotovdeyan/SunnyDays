<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\service.php';
$service3 = new Service(3);

// print_r ($service);die;
require_once 'C:\xampp\htdocs\SunnyDays\views\service\service_3-html.php';
