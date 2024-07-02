<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_informantion";
$port = 4307;

// Establishing connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname,$port);

// Check connection
if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}


?>
