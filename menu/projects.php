<?php 
session_start();
define("cmsdp", true);
?>

<?php
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\project.php';
$project1 = new Project(1);
$project2 = new Project(2);

require_once 'C:\xampp\htdocs\cmsdp\views\projects-html.php';