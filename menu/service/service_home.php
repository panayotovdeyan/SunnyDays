<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\service.php';
$service1 = new Service(1);
$publishedYes1=$service1->published;

$service2 = new Service(2);
$publishedYes2=$service2->published;

$service3 = new Service(3);
$publishedYes3=$service3->published;

$service4 = new Service(4);
$publishedYes4=$service4->published;

$service5 = new Service(5);
$publishedYes5=$service5->published;

$service6 = new Service(6);
$publishedYes6=$service6->published;


require_once 'C:\xampp\htdocs\SunnyDays\views\service\service_home-html.php';