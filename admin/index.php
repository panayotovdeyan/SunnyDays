<?php
session_start();
if( $_SESSION['user']['admin'] == 1 ){
    //
}else{
    header('Location: ../index.php');
}
define("admindp", true);
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
include_once 'aviews/index-html.php';