<?php 
session_start();
define("cmsdp", true);
?>

<?php
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\offer.php';
$offer1 = new Offer(1);


require_once 'C:\xampp\htdocs\cmsdp\mailOffer.php';