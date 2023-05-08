<?php
function sendMailContact($fromName, $fromEmail, $fromPhone, $fromAdress, $message, 
    $to = 'contact@sunnydays.com', 
    $subject = 'Запитване за оферта'){

    $message = wordwrap($message, 70, "\r\n");
    $headers = 'From:'.trim($fromName)."\n";
    $headers = 'Email:'.trim($fromEmail)."\n";
    $headers = 'Tel:'.trim($fromPhone)."\n";
    $headers = 'Adress:'.trim($fromAdress)."\n";
    $headers .= 'Reply-To:'.trim($fromName)."\n";
    $headers .= 'MIME-Version: 1.0'."\n";
    $headers .= 'Content-type: text/html; charset=UTF-8'."\n";
    @mail($to, $subject, $message, $headers);
}

function sendMailOffer($fromName, $fromEmail, $fromPhone, $fromAdress, $message, 
    $to = 'contact@sunnydays.com', 
    $subject = 'Запитване за оферта'){

    $message = wordwrap($message, 70, "\r\n");
    $headers = 'From:'.trim($fromName)."\n";
    $headers = 'Email:'.trim($fromEmail)."\n";
    $headers = 'Tel:'.trim($fromPhone)."\n";
    $headers = 'Adress:'.trim($fromAdress)."\n";
    $headers .= 'Reply-To:'.trim($fromName)."\n";
    $headers .= 'MIME-Version: 1.0'."\n";
    $headers .= 'Content-type: text/html; charset=UTF-8'."\n";
    @mail($to, $subject, $message, $headers);
}

function cleanInput($data) {		//функция, която връща подадените данни без риск
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function createCsrfToken(){ //CSRF stands for Cross-Site Request Forgery (Forgery -> фалшификация)
    $result = '';
    $result = md5('gf75sd6'.time().'2*15G54@#');
    return $result;
}

function incrementWrongLogins(){
    if( !isset($_SESSION['wrong_logins']) ){
        $_SESSION['wrong_logins'] = 0;
    }
    $_SESSION['wrong_logins']++;
}

function getPageAbout($id=0){
    $res = array();
    $sql_req = "";
    if( $id > 0 ){
        $sql_req = " AND id={$id} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $querySQL = "SELECT * FROM `pageabout` WHERE 1=1 ". $sql_req ." ORDER BY id ASC";
    $result = mysqli_query($conn, $querySQL);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if( $id > 0 ){
            $res = $res[0];
        }
    }else{
        die('Query error');
    }
    return $res;
}

function getServices($id=0){
    $res = array();
    $sql_req = "";
    if( $id > 0 ){
        $sql_req = " AND id={$id} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $querySQL = "SELECT * FROM `services` WHERE 1=1 ". $sql_req ." ORDER BY id ASC";
    $result = mysqli_query($conn, $querySQL);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if( $id > 0 ){
            $res = $res[0];
        }
    }else{
        die('Query error');
    }
    return $res;
}

function getProject($id=0){
    $res = array();
    $sql_req = "";
    if( $id > 0 ){
        $sql_req = " AND id={$id} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $querySQL = "SELECT * FROM `projects` WHERE 1=1 ". $sql_req ." ORDER BY id ASC";
    $result = mysqli_query($conn, $querySQL);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if( $id > 0 ){
            $res = $res[0];
        }
    }else{
        die('Query error');
    }
    return $res;
}

function getOffer($id=0){
    $res = array();
    $sql_req = "";
    if( $id > 0 ){
        $sql_req = " AND id={$id} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $querySQL = "SELECT * FROM `offer` WHERE 1=1 ". $sql_req ." ORDER BY id ASC";
    $result = mysqli_query($conn, $querySQL);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if( $id > 0 ){
            $res = $res[0];
        }
    }else{
        die('Query error');
    }
    return $res;
}

function getTeam($id=0){
    $res = array();
    $sql_req = "";
    if( $id > 0 ){
        $sql_req = " AND id={$id} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $querySQL = "SELECT * FROM `team` WHERE 1=1 ". $sql_req ." ORDER BY id ASC";
    $result = mysqli_query($conn, $querySQL);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if( $id > 0 ){
            $res = $res[0];
        }
    }else{
        die('Query error');
    }
    return $res;
}

// function getReporting($reportId=0){
//     $res = array();
//     $sql_req = "";
//     if( $reportId > 0 ){
//         $sql_req = " AND reportId={$reportId} ";
//     }
//     if( empty($GLOBALS['SQL']) ){
//         require_once 'db_cmsdp.php';
//     }else{
//         $conn = $GLOBALS['SQL'];
//     }
//     $querySQL = "SELECT * FROM `reporting` WHERE 1=1 ". $sql_req ." ORDER BY reportId DESC";
//     $result = mysqli_query($conn, $querySQL);
//     if( !empty($result) ){
//         $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
//         if( $reportId > 0 ){
//             $res = $res[0];
//         }
//     }else{
//         die('Query error');
//     }
//     return $res;
// }

function getReportingByUser($userId=0){
    $res = array();
    $sql_req = "";
    if( $userId > 0 ){
        $sql_req = " AND userId={$userId} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $querySQL = "SELECT * FROM `reporting` WHERE 1=1 ". $sql_req ." ORDER BY reportId DESC";
    $result = mysqli_query($conn, $querySQL);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
        die('Query error');
    }
    return $res;
}

function getMonitoring($reportId=0){
    $res = array();
    $sql_req = "";
    if( $reportId > 0 ){
        $sql_req = " AND reportId={$reportId} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $querySQL = "SELECT * FROM `daymonitoring` WHERE 1=1 ". $sql_req ." ORDER BY reportId ASC";
    $result = mysqli_query($conn, $querySQL);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if( $reportId > 0 ){
            $res = $res[0];
        }
    }else{
        die('Query error');
    }
    return $res;
}


function getFiles($path="../assets/images")
{
	$path = str_replace("/","\\",$path);
    $res = array();
    $res = array_diff(scandir($path), array('.', '..'));
    return $res;
}

function getAvatar($avatar_path = "images/avatars/"){ // Пътят до папката, където се намират аватарите или снимките на потребителите 
    // Името на снимката на потребителя
    $user_avatar = "user123.jpg";

    // Създаване на HTML елемент за вграждане на аватара или снимката на потребителя
    echo '<img src="' . $avatar_path . $user_avatar . '" alt="User Avatar">';
}

function getNames($id=0){
    $res = array();
    $name_req = "";
    if( $id > 0 ){
        $sql_name = " AND id={$id} ";
    }
    if( empty($GLOBALS['SQL']) ){
        require_once 'db_cmsdp.php';
    }else{
        $conn = $GLOBALS['SQL'];
    }
    $sql = "SELECT FROM `names` WHERE 1=1 ". $sql_req ." ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if( !empty($result) ){
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if( $id > 0 ){
            $res = $res[0];
        }
    }else{
        die('Query error');
    }
    return $res;
}