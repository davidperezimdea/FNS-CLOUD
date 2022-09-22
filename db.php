<?php
//Db linkection parameters

$host = 'localhost';
$user = '';
$pass = '';
$db = '';
// Create linkection

$link = mysqli_connect($host, $user, $pass, $db);
 
// Check linkection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
