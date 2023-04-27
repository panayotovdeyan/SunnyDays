<?php 
// if( !defined('cmsdp') ) exit();
// require_once 'views/header-html.php';
?>

<?php 
session_start();
define("cmsdp", true);
?>

<?php
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\team.php';
$member1 = new Team(1);
$member2 = new Team(2);
$member3 = new Team(3);
$member4 = new Team(4);
$member5 = new Team(5);
$member6 = new Team(6);

require_once 'C:\xampp\htdocs\cmsdp\views\team-html.php';
