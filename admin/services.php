<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){

define("admindp", true);
require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
require_once 'C:\xampp\htdocs\SunnyDays\classes\service.php';

$saveEdit = '';
$serv = new Service(1);

    if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 2 ){
        $id = cleanInput($_REQUEST['id']);
        $id = mysqli_real_escape_string($conn, $id);

            if( $id > 0 ){
            $service_name = cleanInput($_REQUEST['service_name']);
            $service_name = mysqli_real_escape_string($conn, $service_name);
            $service_subname = cleanInput($_REQUEST['service_subname']);
            $service_subname = mysqli_real_escape_string($conn, $service_subname);
            $service_image = cleanInput($_REQUEST['service_image']);
            $service_image = mysqli_real_escape_string($conn, $service_image);
            $service_description = cleanInput($_REQUEST['service_description']);
            $service_description = mysqli_real_escape_string($conn, $service_description);

            $serv = new Service($id);
            $serv->service_name = $service_name;
            $serv->service_subname = $service_subname;
            $serv->service_image = $service_image;
            $serv->service_description = $service_description;
            if( !empty($serv->service_name) ){
                $serv->update();
                $saveEdit = $serv->service_name;
                $serv = getServices();

                include_once 'aviews/serv-html.php';
            }else{
                include_once 'aviews/edit-html/serv-html-edit.php';
            }
        }

    }else if( isset($_REQUEST['id']) ){
        $id = cleanInput($_REQUEST['id']);
        $id = mysqli_real_escape_string($conn, $id);
            if( $id > 0 ){
                $serv = new Service($id);
                include_once 'aviews/edit-html/serv-html-edit.php';
            }
        }else{
            $serv = getServices();
            include_once 'aviews/serv-html.php';
            }
}else{
    header('Location: index.php');
}