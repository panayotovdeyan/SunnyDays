<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    
define("admindp", true);
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\offer.php';

$saveEdit = '';
$offer = new Offer(1);

if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 4 ){
    $id = cleanInput($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn, $id);
    
            if( $id > 0 ){
            $title = cleanInput($_REQUEST['title']);
            $title = mysqli_real_escape_string($conn, $title);
            $subtitle = cleanInput($_REQUEST['subtitle']);
            $subtitle = mysqli_real_escape_string($conn, $subtitle);
            $image = cleanInput($_REQUEST['image']);
            $image = mysqli_real_escape_string($conn, $image);
            $text = cleanInput($_REQUEST['text']);
            $text = mysqli_real_escape_string($conn, $text);

            $ofer = new Offer($id);
            $ofer->title = $title;
            $ofer->subtitle = $subtitle;
            $ofer->image = $image;
            $ofer->text = $text;
            if( !empty($ofer->title) ){
                $ofer->update();
                $saveEdit = $ofer->title;
                $offer  = getoffer();
                include_once 'aviews/offers-html.php';
            }else{
                include_once 'aviews/edit-html/offers-html-edit.php';
            }
        }

}else if( isset($_REQUEST['id']) ){
    $id = cleanInput($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn, $id);
        if( $id > 0 ){
            $offer = new Offer($id);
            include_once 'aviews/edit-html/offers-html-edit.php';
        }
                }else{
                    $offer = getOffer();
                    include_once 'aviews/offers-html.php';
            }
}else{
    header('Location: index.php');
}