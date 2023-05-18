<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    
define("admindp", true);
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\project.php';

$saveEdit = '';
$project = new Project(1);

if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 3 ){
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

            $proj = new Project($id);
            $proj->title = $title;
            $proj->subtitle = $subtitle;
            $proj->image = $image;
            $proj->text = $text;
            if( !empty($proj->title) ){
                $proj->update();
                $saveEdit = $proj->title;
                $project  = getProject();
                include_once 'aviews/projects-html.php';
            }else{
                include_once 'aviews/edit-html/projects-html-edit.php';
            }
        }

}else if( isset($_REQUEST['id']) ){
    $id = cleanInput($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn, $id);
        if( $id > 0 ){
            $project = new Project($id);
            include_once 'aviews/edit-html/projects-html-edit.php';
        }
                }else{
                    $project = getProject();
                    include_once 'aviews/projects-html.php';
            }
}else{
    header('Location: index.php');
}