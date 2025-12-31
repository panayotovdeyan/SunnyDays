<?php 
// if( !defined('SunnyDays') ) exit();
// require_once 'views/header-html.php';
?>

<?php 
session_start();
define("SunnyDays", true);
?>

<?php
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\team.php';
$member1 = new Team(1);
$member2 = new Team(2);
$member3 = new Team(3);
$member4 = new Team(4);
$member5 = new Team(5);
$member6 = new Team(6);
$member7 = new Team(7);

require_once 'C:\xampp\htdocs\SunnyDays\views\team-html.php';
