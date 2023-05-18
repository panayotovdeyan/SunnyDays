<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\offer.php';
$offer1 = new Offer(1);

require_once 'C:\xampp\htdocs\SunnyDays\views\offer-html.php';
require_once 'C:\xampp\htdocs\SunnyDays\mailOffer.php';