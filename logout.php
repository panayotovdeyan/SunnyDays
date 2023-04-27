<?php
session_start();
define("cmsdp", true);
//- проверка, дали има потвърждение za izhod - виж views/logout-html.php  

if( isset($_REQUEST['logout']) && $_REQUEST['logout'] == 1 ){
    unset( $_SESSION['user'] ); 
    unset( $_SESSION['loged'] );
    header ('Location: index.php');
}
require_once 'views/logout-html.php';