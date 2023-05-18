<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\pageAbout.php';
$pageAbout1 = new PageAbout(1);
$pageAbout2 = new PageAbout(2);
$pageAbout3 = new PageAbout(3);
$pageAbout4 = new PageAbout(4);
require_once 'C:\xampp\htdocs\SunnyDays\views\about-html.php';
