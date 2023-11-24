<?php

$hostName = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$dbName = "register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, 3307);
if (!$conn) {
    die("Something went wrong;");
}

?>