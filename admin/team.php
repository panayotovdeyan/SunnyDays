<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){

define("admindp", true);
require_once 'C:\xampp\htdocs\cmsdp\includes\db_cmsdp.php';
require_once 'C:\xampp\htdocs\cmsdp\includes\functions.php';
require_once 'C:\xampp\htdocs\cmsdp\classes\team.php';

$saveEdit = '';
$member = new Team(1);

    if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 5 ){
        $id = cleanInput($_REQUEST['id']);
        $id = mysqli_real_escape_string($conn, $id);

            if( $id > 0 ){
            $memberName = cleanInput($_REQUEST['memberName']);
            $memberName = mysqli_real_escape_string($conn, $memberName);
            $memberPosition = cleanInput($_REQUEST['memberPosition']);
            $memberPosition = mysqli_real_escape_string($conn, $memberPosition);
            $memberImage = cleanInput($_REQUEST['memberImage']);
            $memberImage = mysqli_real_escape_string($conn, $memberImage);
            $memberDescription = cleanInput($_REQUEST['memberDescription']);
            $memberDescription = mysqli_real_escape_string($conn, $memberDescription);

            $member = new Team($id);
            $member->memberName = $memberName;
            $member->memberPosition = $memberPosition;
            $member->memberImage = $memberImage;
            $member->memberDescription = $memberDescription;
            if( !empty($member->memberName) ){
                $member->update();
                $saveEdit = $member->memberName;
                $member = getTeam();

                include_once 'aviews/team-html.php';
            }else{
                include_once 'aviews/edit-html/team-html-edit.php';
            }
        }

    }else if( isset($_REQUEST['id']) ){
        $id = cleanInput($_REQUEST['id']);
        $id = mysqli_real_escape_string($conn, $id);
            if( $id > 0 ){
                $member = new Team($id);
                include_once 'aviews/edit-html/team-html-edit.php';
            }
        }else{
            $member = getTeam();
            include_once 'aviews/team-html.php';
            }
}else{
    header('Location: index.php');
}