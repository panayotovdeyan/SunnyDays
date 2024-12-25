<?php
$dbhost = "localhost";	//$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$db = "SunnyDays";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if (!$conn) {
    die("Connection with db failed: " . mysqli_connect_error());
}
$GLOBALS['SQL'] = $conn;

// mysqli_close($conn); - затваряне на конекцията (в php.  не се грижим за затваряне на текущата конекция, тя сама се затваря)