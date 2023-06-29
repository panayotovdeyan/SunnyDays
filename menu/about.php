<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\pageAbout.php';
$pageAbout1 = new PageAbout(1);
$publishedYes1=$pageAbout1->published;

$pageAbout2 = new PageAbout(2);
$publishedYes2=$pageAbout2->published;

$pageAbout3 = new PageAbout(3);
$publishedYes3=$pageAbout3->published;

$pageAbout4 = new PageAbout(4);
$publishedYes4=$pageAbout4->published;

// print_r($publishedYes1);die;

require_once 'C:\xampp\htdocs\SunnyDays\views\about-html.php';
