<?php 
session_start();
define("cmsdp", true);
?>

<?php
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\service.php';
$service1 = new Service(1);

// print_r ($service);die;
require_once 'C:\xampp\htdocs\cmsdp\views\service\service_1-html.php';
