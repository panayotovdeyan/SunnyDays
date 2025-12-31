<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    
    define("admindp", true);
    require_once 'C:\xampp\htdocs\SunnyDays\includes\db_SunnyDays.php';
    require_once 'C:\xampp\htdocs\SunnyDays\includes\functions.php';
    require_once 'C:\xampp\htdocs\SunnyDays\classes\team.php';

    $saveEdit = '';
    
    // 1. Обработка на Записа (Update)
    if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 5 ){
        $id = intval($_REQUEST['id']);
        
        if( $id > 0 ){
            $member = new Team($id);
            $member->memberName = cleanInput($_REQUEST['memberName']);
            $member->memberPosition = cleanInput($_REQUEST['memberPosition']);
            $member->memberImage = cleanInput($_REQUEST['memberImage']);
            
            // ВАЖНО: Без cleanInput за описанието заради CKEditor!
            $text = $_REQUEST['memberDescription'];
            $member->memberDescription = mysqli_real_escape_string($conn, $text);
            
            $member->published = isset($_REQUEST['published']) ? 1 : 0;

            // Валидация: За ID 7 (презентация) името може да е празно
            if( !empty($member->memberName) || $id == 7 ){
                $member->update();
                $saveEdit = ($id == 7) ? "Презентация на екипа" : $member->memberName;
                
                // След запис презареждаме списъците
                $allMembers = getTeam(); 
                include_once 'aviews/team-html.php';
            } else {
                include_once 'aviews/edit-html/team-html-edit.php';
            }
        }

    // 2. Зареждане на форма за Редакция
    } else if( isset($_REQUEST['id']) ){
        $id = intval($_REQUEST['id']);
        if( $id > 0 ){
            $member = new Team($id);
            include_once 'aviews/edit-html/team-html-edit.php';
        }
    
    // 3. Първоначално зареждане на списъка (Двете таблици)
    } else {
        $allMembers = getTeam(); // Взимаме всички от БД
        include_once 'aviews/team-html.php';
    }
} else {
    header('Location: index.php');
}