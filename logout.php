<?php
session_start();
define("SunnyDays", true);
//- проверка, дали има потвърждение za izhod - виж views/logout-html.php  

if( isset($_REQUEST['logout']) && $_REQUEST['logout'] == 1 ){
    unset( $_SESSION['user'] ); 
    unset( $_SESSION['loged'] );
    session_destroy();
    header ('Location: index.php');
}
require_once 'views/logout-html.php';