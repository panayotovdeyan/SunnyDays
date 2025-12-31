<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    
define("admindp", true);
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\offer.php';

$saveEdit = '';
$offer = new Offer(1);

if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 4 ){
    $id = ($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn, $id);
    
            if( $id > 0 ){
            $title = ($_REQUEST['title']);
            $title = mysqli_real_escape_string($conn, $title);
            $subtitle = ($_REQUEST['subtitle']);
            $subtitle = mysqli_real_escape_string($conn, $subtitle);
            $image = ($_REQUEST['image']);
            $image = mysqli_real_escape_string($conn, $image);
            $text = $_REQUEST['text'];
            $text = mysqli_real_escape_string($conn, $text);

            $offer = new Offer($id);
            $offer->title = $title;
            $offer->subtitle = $subtitle;
            $offer->image = $image;
            $offer->text = $text;
            if( !empty($offer->title) ){
                $offer->update();
                $saveEdit = $offer->title;
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