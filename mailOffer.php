<?php 
if( !defined('cmsdp') ) exit();



require_once 'includes/functions.php';
require_once 'includes/db_cmsdp.php';

if( isset($_REQUEST['mailOffer']) && $_REQUEST['mailOffer'] == 1){
    //Sent email Offer
    
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if( $_SESSION['csrf_token'] != $csrf ){
        incrementWrongLogins();
        die("Not found!");
    }

    $fromName = cleanInput($_REQUEST['name']);
    $fromName = mysqli_real_escape_string($conn, $fromName);
    $fromEmail = cleanInput($_REQUEST['email']);
    $fromEmail = mysqli_real_escape_string($conn, $fromEmail);
    $fromEmail = filter_var($fromEmail, FILTER_VALIDATE_EMAIL);
    $fromPhone = cleanInput($_REQUEST['phone']);
    $fromPhone = mysqli_real_escape_string($conn, $fromPhone);
    $fromAdress = cleanInput($_REQUEST['adress']);
    $fromAdress = mysqli_real_escape_string($conn, $fromAdress);
    $message = cleanInput($_REQUEST['register_family']);
    $message = mysqli_real_escape_string($conn, $message);

    if( !empty($email) ){ 
        //not empty email
        die('D2');

    }
}

require_once 'views/offer-html.php';

?>