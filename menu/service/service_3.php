<?php 
session_start();
define("cmsdp", true);
?>

<?php
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\service.php';
$service3 = new Service(3);

// print_r ($service);die;
require_once 'C:\xampp\htdocs\cmsdp\views\service\service_3-html.php';
