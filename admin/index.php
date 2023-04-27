<?php
session_start();
if( $_SESSION['user']['admin'] == 1 ){
    //
}else{
    header('Location: ../index.php');
}
define("admindp", true);
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
include_once 'aviews/index-html.php';