<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\project.php';
$project1 = new Project(1);
$project2 = new Project(2);

require_once 'C:\xampp\htdocs\SunnyDays\views\projects-html.php';