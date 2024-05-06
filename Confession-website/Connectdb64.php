<?php
//$hostName = "localhost";
$hostName = "127.0.0.1";
$dbUser = "root";
$dbPassword = "root";
$dbName = "Login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong");
}
?>