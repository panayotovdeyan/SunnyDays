<?php 
session_start();
define("cmsdp", true);
?>

<?php
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\pageAbout.php';
$pageAbout1 = new PageAbout(1);
$pageAbout2 = new PageAbout(2);
$pageAbout3 = new PageAbout(3);
$pageAbout4 = new PageAbout(4);
require_once 'C:\xampp\htdocs\cmsdp\views\about-html.php';
