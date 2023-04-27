<?php 
session_start();
define("cmsdp", true);

if( $_SESSION['user']['admin'] == 1 ){
    header ('Location: admin/index.php');
}else{
    include_once 'views/profile-html.php';
}