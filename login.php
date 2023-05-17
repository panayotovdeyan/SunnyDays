<?php
session_start();
define("cmsdp", true);
// session_destroy();

if( isset($_SESSION['wrong_logins']) && $_SESSION['wrong_logins'] == 3 ){
    echo "<script> 
    alert ('Имате още 3 (три) опита за влизане в сайта, въвеждайте внимателно данните си!')
    </script>";
}

if ( isset($_SESSION['wrong_logins']) && $_SESSION['wrong_logins'] > 5){
    die("<script> 
        alert ('Изчерпахте опитите си за влизане в сайта!')
        document.location.href = 'index.php'
        </script>");
}

if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    $loged = true;

    
}else{
    $loged = false;
}
$formerror = false;
$rformerror = false;

require_once 'includes/functions.php';
if( isset($_REQUEST['login']) && $_REQUEST['login'] == 1 && !$loged ){

    //login

    require_once 'includes/db_cmsdp.php';
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if( $_SESSION['csrf_token'] != $csrf ){
        incrementWrongLogins();
        die("Not found!");
    }
    $pass = cleanInput($_REQUEST['password']);
    $pass = mysqli_real_escape_string($conn, $pass);
    $email = cleanInput($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if( !empty($email) && !empty($pass) ){

        //check for valid user

        $querySQL = "SELECT userId, name, family, email, password, admin FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $querySQL);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if( password_verify($pass, $data[0]['password']) ){
                $loged = true;
                $_SESSION['user']['userId'] = $data[0]['userId'];
                $_SESSION['user']['name'] = $data[0]['name'];
                $_SESSION['user']['family'] = $data[0]['family'];
                $_SESSION['user']['email'] = $data[0]['email'];
                $_SESSION['user']['admin'] = $data[0]['admin'];
            }else{
                $formerror = true;
                incrementWrongLogins();
            }
        }else{
            die('Query error');
        }
    }else{
        $formerror = true;
    }
}

elseif( isset($_REQUEST['logout']) && $_REQUEST['logout'] == 1 ){
    //logout
    $loged = false;
    unset($_SESSION['user']);
}
$_SESSION['loged'] = $loged;
$_SESSION['csrf_token'] = createCsrfToken();
?>
<style>
    body { font-size: 20px; }
</style>
<?php
if( $formerror ){
    header ('Location: views/wrongPass-html.php');
}
if( $rformerror ){
    echo 'Error on registration!';
}
if( !$loged ){
    include_once 'views/login-html.php';
            
}else{

    
    if( $_SESSION['user']['admin'] == 1 ){
        header ('Location: admin/index.php');
    }else{
        header ('Location: profile.php');
    }

}
