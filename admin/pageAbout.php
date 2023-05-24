<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    
define("admindp", true);
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\pageAbout.php';

$saveEdit = '';
$pageAbout= new PageAbout(1);

if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 1 ){
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
            $published = ($_REQUEST['published']);
            $published = mysqli_real_escape_string($conn, $published);

            $page = new PageAbout($id);
            $page->title = $title;
            $page->subtitle = $subtitle;
            $page->image = $image;
            $page->text = $text;
            $page->published = $published;
            if( !empty($page->title) ){
                $page->update();
                $saveEdit = $page->title;
                $pageAbout = getPageAbout();
                include_once 'aviews/pageAbout-html.php';
            }else{
                include_once 'aviews/edit-html/pageAbout-html-edit.php';
            }
        }

}else if( isset($_REQUEST['id']) ){
    $id = cleanInput($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn, $id);
        if( $id > 0 ){
            $pageAbout = new PageAbout($id);
            include_once 'aviews/edit-html/pageAbout-html-edit.php';
        }
                }else{
                    $pageAbout = getPageAbout();
                    include_once 'aviews/pageAbout-html.php';
            }
}else{
    header('Location: index.php');
}